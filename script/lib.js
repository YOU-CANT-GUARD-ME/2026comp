const createSvg = (element, attrs = {}) => {
  const el = document.createElementNS("http://www.w3.org/2000/svg", element);
  Object.entries(attrs).forEach(([k, v]) => el.setAttribute(k, v));
  return el;
};
const mapContainer = $(".map-container");
const libs = await fetch("/asset/도서관현황.json").then((res) => res.json());
await fetch("/asset/southKoreaHigh.svg")
  .then((res) => res.text())
  .then((text) => {
    mapContainer.innerHTML = text;
  });

const nameMap = {
  서울특별시: "서울",
  부산광역시: "부산",
  대구광역시: "대구",
  인천광역시: "인천",
  광주광역시: "광주",
  대전광역시: "대전",
  울산광역시: "울산",
  경기도: "경기",
  강원특별자치도: "강원",
  충청북도: "충북",
  충청남도: "충남",
  전라북도: "전북",
  전라남도: "전남",
  경상북도: "경북",
  경상남도: "경남",
  제주특별자치도: "제주",
  세종특별자치시: "세종",
};
const normalMap = {
  전북특별자치도: "전라북도",
  강원도: "강원특별자치도",
};
const posOffset = {
  경상북도: { dx: -100, dy: 30 },
  충청북도: { dx: -20, dy: -20 },
  경기도: { dx: 40, dy: 30 },
};
const libStats = libs.reduce((acc, lib) => {
  const name = normalMap[lib["시도명"]] ?? lib["시도명"];
  acc[name] ??= { libCount: 0, bookCount: 0, seatCount: 0 };
  acc[name].libCount++;
  acc[name].bookCount += +lib["자료수(도서)"];
  acc[name].seatCount += +lib["열람좌석수"];
  return acc;
}, {});
const statKeys = ["libCount", "bookCount", "seatCount"];
const statValues = Object.values(libStats);
const minMax = {};
statKeys.forEach(
  (key) =>
    (minMax[key] = {
      min: Math.min(...statValues.map((v) => v[key])),
      max: Math.max(...statValues.map((v) => v[key])),
    }),
);

const percentile = (value, key) => {
  const { min, max } = minMax[key];
  return min === max ? 0 : ((value - min) / (max - min)) * 100;
};
const barLabels = {
  libCount: "도서관수",
  bookCount: "자료수(도서)",
  seatCount: "열람좌석수",
};
const barColors = { libCount: "red", bookCount: "green", seatCount: "blue" };
const tooltip = $(".tooltip");

function renderMap() {
  const svg = $("svg");
  svg.setAttribute("width", "550");
  svg.setAttribute("height", "880");

  const barGap = 1;
  const barWidth = 4;
  const barMaxHeight = 30;
  const barGroupWidth = (barGap + barWidth) * statKeys.length;

  $$("path[title]").forEach((path) => {
    const raw = path.getAttribute("title");
    const title = nameMap[raw] ?? raw;
    const offset = posOffset[raw] ?? { dx: 0, dy: 0 };
    const bbox = path.getBBox();
    const cx = bbox.x + bbox.width / 2 + offset.dx;
    const cy = bbox.y + bbox.height / 2 + offset.dy;

    const stats = libStats[raw];
    const g = createSvg("g", { cursor: "pointer" });

    statKeys.forEach((key, i) => {
      const pct = percentile(stats[key], key);
      const h = Math.max((pct / 100) * barMaxHeight, 1);
      const x = cx - barGroupWidth / 2 + i * (barGap + barWidth);
      const y = cy - 10 - h;
      const bar = createSvg("rect", {
        x,
        y,
        width: barWidth,
        height: h,
        fill: barColors[key],
        rx: 1,
      });
      g.append(bar);
    });
    const tipLine = statKeys.map(
      (key) => `${barLabels[key]}: ${stats[key].toLocaleString()}`,
    );
    const tipText = `[${title}]\n${tipLine.join("\n")}`;
    g.addEventListener("mouseenter", (e) => {
      tooltip.textContent = tipText;
      tooltip.classList.add("visible");
      tooltip.style.left = `${e.clientX + 12}px`;
      tooltip.style.top = `${e.clientY + 12}px`;
    });
    g.addEventListener("mousemove", (e) => {
      tooltip.style.left = `${e.clientX + 12}px`;
      tooltip.style.top = `${e.clientY + 12}px`;
    });
    g.addEventListener("mouseup", (e) => {
      tooltip.classList.remove("visible");
    });
    const text = createSvg("text", {
      x: cx,
      y: cy,
      "text-anchor": "middle",
      "dominant-baseline": "central",
      "font-size": "10px",
      "font-weight": "bold",
    });
    text.textContent = title;
    g.append(text);
    svg.append(g);
  });
}
renderMap();

const columns = [
  "시도명",
  "도서관명",
  "시군구명",
  "도서관유형",
  "휴관일",
  "평일운영시작시각",
  "평일운영종료시각",
  "열람좌석수",
  "자료수(도서)",
  "대출가능권수",
  "대출가능일수",
  "소재지도로명주소",
];

const sortSelect = $(".sort-select");
const searchInput = $(".search-input");
const tbody = $(".lib-table tbody");
function renderTable() {
  const keyword = searchInput.value.trim();
  const sortOrder = sortSelect.value;
  const sorted = [...libs].toSorted((a, b) => {
    if (sortOrder) {
      const diff = +a["자료수(도서)" || 0] - +b["자료수(도서)" || 0];
      return sortOrder === "asc" ? diff : -diff;
    }
    return (a["시도명"] || "").localeCompare(b["시도명"] || "");
  });
  const filtered = keyword
    ? sorted.filter((lib) => lib["도서관명"]?.includes(keyword))
    : sorted;
  tbody.innerHTML = filtered
    .map((lib) => {
      const cells = columns
        .map((col) => {
          const val = lib[col] ?? "";
          if (col === "도서관명" && keyword) {
            return `<td>${val.replaceAll(keyword, `<mark>${keyword}</mark>`)}</td>`;
          }
          return `<td>${val}</td>`;
        })
        .join("");
      return `<tr>${cells}</tr>`;
    })
    .join("");
}

sortSelect.addEventListener("change", renderTable);
searchInput.addEventListener("input", renderTable);
renderTable();
