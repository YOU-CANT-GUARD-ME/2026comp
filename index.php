<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
</head>

<body>
    <input type="radio" name="popupm" id="pop" hidden>
    <div class="popup">
        <div class="popupmodal">
            <div class="popup-t">
                <div class="poptitle">2025년 지방기능경기대회 참가원서 접수 공고사항을 아래 같이 알려드립니다.</div>
            </div>
            <div class="popup-m">
                <div class="popimg"><img src="./images/images (1).png" alt=""></div>
                <div class="popuptext">
                    <h3>□ 접수기간 : 2025. 1. 13.(월) ～ 1. 24.(금) 18:00 마감 [12일간]</h3>
                    <h3>□ 대상직종 : 웹디자인및개발 등 48개 직종</h3>
                    <h3>□ 접수방법 : 마이스터넷 홈페이지 인터넷 접수</h3>
                </div>
            </div>
            <div class="popup-b">
                <label class="popclose" for="pop">닫기</label>
            </div>
        </div>
    </div>

    <?php require_once "./header.php"; ?>

    <!-- 슬라이드 -->
    <div class="heroBanner">
        <div class="slide">
            <div class="bg"><p>숙련기술의 지식창고</p><span>1</span></div>
            <div class="bg"><p>전문기술 도서관</p><span>2</span></div>
            <div class="bg"><p>열람실 예약 오픈</p><span>3</span></div>
            <div class="bg"><p>숙련기술의 지식창고</p><span>1</span></div>
        </div>

    <div class="hero-progress">
        <div class="progress-fill"></div>
    </div>
    </div>

    <!-- 소식 -->

    <input type="radio" name="notice" id="nb1" class="n" checked>
    <input type="radio" name="notice" id="nb2" class="n">
    <input type="radio" name="notice" id="nb3" class="n">

    <div class="notice">
        <div class="notice-container">
            <div class="title">
                <div class="en">LIBRARY NOTICE</div>
                <div class="Bt">도서관소식</div>
            </div>
            <div class="n-btns">
                <label for="nb1" class="n-lbl">일반공지</label>
                <label for="nb2" class="n-lbl">행사안내</label>
                <label for="nb3" class="n-lbl">채용안내</label>
            </div>

            <div class="Ncon con1">
                <div class="Nbox">
                    <div class="Ntext">더운 여름 힘내요 – 연구정보실 개실 6주년 기념이벤트 당첨자 발표</div>
                    <div class="Ndate">2024-08-08</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">더운 여름 힘내요 – 연구정보실 개실 6주년 기념이벤트</div>
                    <div class="Ndate">2024-07-24</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">연구자를 위한 텍스트 마이닝(심화) 교육생 모집 안내</div>
                    <div class="Ndate">2024-07-17</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">「실감체험관」 전국민 소문내기 이벤트 당첨자 발표</div>
                    <div class="Ndate">2024-06-10</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">디지털인문학과 네트워크 분석 교육생 모집 안내</div>
                    <div class="Ndate">2024-05-14</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">스킬스북도서관 -「청년 디지털 봉사단 ‘잇(IT)다’5기」- 최종 합격자 발표</div>
                    <div class="Ndate">2024-05-10</div>
                </div>
            </div>

            <div class="Ncon con2">
                <div class="Nbox">
                    <div class="Ntext">2024년 제9회 「월간 인문학을 만나다」 강연 안내</div>
                    <div class="Ndate">2024-08-08</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">「스킬스북도서관이 간식박스 쏩니다!」7월 당첨 발표</div>
                    <div class="Ndate">2024-08-07</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">별 헤는 「실감체험관」이벤트</div>
                    <div class="Ndate">2024-07-25</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">2024년 제8회 「월간 인문학을 만나다」 강연 안내</div>
                    <div class="Ndate">2024-07-15</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">스킬스북도서관이 간식박스 쏩니다!</div>
                    <div class="Ndate">2024-07-02</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">2024년 제7회 「월간 인문학을 만나다」 강연 안내</div>
                    <div class="Ndate">2024-07-01</div>
                </div>
            </div>

            <div class="Ncon con3">
                <div class="Nbox">
                    <div class="Ntext">2024년 사서직 공무원 경력경쟁채용 필기시험 정답가안 공개 및 이의제기 안내</div>
                    <div class="Ndate">2024-08-03</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">스킬스북도서관 공무직 근로자(미화) 채용 서류전형 합격자 및 면접전형 공고</div>
                    <div class="Ndate">2024-08-02</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">2024년도 사서직 공무원 경력경쟁채용 필기시험 일정 ‧ 장소 및 응시자 준수사항 공고</div>
                    <div class="Ndate">2024-07-26</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">스킬스북도서관 공무직 근로자(미화) 채용공고(재재공고)</div>
                    <div class="Ndate">2024-07-24</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">스킬스북도서관 국가서지과 공무직 근로자 채용 최종 합격자 공고</div>
                    <div class="Ndate">2024-07-18</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">스킬스북도서관 국가서지과 기간제 근로자(휴직대체) 채용 최종합격자 공고</div>
                    <div class="Ndate">2024-07-16</div>
                </div>
                <div class="Nbox">
                    <div class="Ntext">스킬스북도서관 국가서지과 공무직 근로자 채용 서류전형(1차) 합격자 발표 및 면접시험(2차) 계획 공고</div>
                    <div class="Ndate">2024-07-05</div>
                </div>
            </div>            
        </div>
    </div>

    <div class="sug-menu">
        <div class="Scon">
            <div class="Sbox"><i class="fa fa-book fa-2x"></i>도서대출</div>
            <div class="Sbox"><i class="fa fa-book fa-2x"></i>도서반납</div>
            <div class="Sbox"><i class="fa fa-book fa-2x"></i>좌석예약</div>
            <div class="Sbox"><i class="fa fa-book fa-2x"></i>희망도서신청</div>
            <div class="Sbox"><i class="fa fa-book fa-2x"></i>AI추천도서</div>
            <div class="Sbox"><i class="fa fa-book fa-2x"></i>전주도서관</div>
        </div>
    </div>

    <input type="checkbox" name="progSection" id="p1" hidden>
    <input type="checkbox" name="progSection" id="p2" hidden>
    <input type="checkbox" name="progSection" id="p3" hidden>
    <input type="checkbox" name="progSection" id="p4" hidden>
    <input type="checkbox" name="progSection" id="p5" hidden>
    <input type="checkbox" name="progSection" id="p6" hidden>
    <input type="checkbox" name="progSection" id="p7" hidden>
    <input type="checkbox" name="progSection" id="p8" hidden>

    <div class="progmodal1 po">
        <div class="poCard">
            <div class="po-t">
                <label for="p1" class="po-xbtn">닫기</label>
            </div>
            <div class="po-m">
                <img src="./prog/1.jpg" alt="">
            </div>
            <div class="po-b">
                <h2>피아니스트 김미정과 함께하는 힐링 클래식</h2>
            </div>
        </div>
    </div>
    <div class="progmodal2 po">
        <div class="poCard">
            <div class="po-t">
                <label for="p2" class="po-xbtn">닫기</label>
            </div>
            <div class="po-m">
                <img src="./prog/2.png" alt="">
            </div>
            <div class="po-b">
                <h2>도란도란] 나를 찾아가는 마음챙김 그림책테라피</h2>
            </div>
        </div>
    </div>
    <div class="progmodal3 po">
        <div class="poCard">
            <div class="po-t">
                <label for="p3" class="po-xbtn">닫기</label>
            </div>
            <div class="po-m">
                <img src="./prog/3.jpg" alt="">
            </div>
            <div class="po-b">
                <h2>신흥어울마당작은]2024년 하반기 프로그램 ' 뚝딱 한국사'</h2>
            </div>
        </div>
    </div>
    <div class="progmodal4 po">
        <div class="poCard">
            <div class="po-t">
                <label for="p4" class="po-xbtn">닫기</label>
            </div>
            <div class="po-m">
                <img src="./prog/4.png" alt="">
            </div>
            <div class="po-b">
                <h2>[수주](성인)마을미디어 교육생 모집</h2>
            </div>
        </div>
    </div>
    <div class="progmodal5 po">
        <div class="poCard">
            <div class="po-t">
                <label for="p5" class="po-xbtn">닫기</label>
            </div>
            <div class="po-m">
                <img src="./prog/5.jpg" alt="">
            </div>
            <div class="po-b">
                <h2>나를 치유하는 명화</h2>
            </div>
        </div>
    </div>
    <div class="progmodal6 po">
        <div class="poCard">
            <div class="po-t">
                <label for="p6" class="po-xbtn">닫기</label>
            </div>
            <div class="po-m">
                <img src="./prog/6.jpg" alt="">
            </div>
            <div class="po-b">
                <h2>[문화가 있는 날] 푸른 하늘이 좋아요!</h2>
            </div>
        </div>
    </div>
    <div class="progmodal7 po">
        <div class="poCard">
            <div class="po-t">
                <label for="p7" class="po-xbtn">닫기</label>
            </div>
            <div class="po-m">
                <img src="./prog/7.jpg" alt="">
            </div>
            <div class="po-b">
                <h2>책 속에서 사람을 만나다</h2>
            </div>
        </div>
    </div>
    <div class="progmodal8 po">
        <div class="poCard">
            <div class="po-t">
                <label for="p8" class="po-xbtn">닫기</label>
            </div>
            <div class="po-m">
                <img src="./prog/8.jpg" alt="">
            </div>
            <div class="po-b">
                <h2>서울 문화의 밤(8월) 행사 - 국지승 그림책 작가와 방구석 북토크</h2>
            </div>
        </div>
    </div>

    <div class="progSection">
        <div class="progCon">
            <div class="title">
                <div class="en">PROGRAM</div>
                <div class="Bt">프로그램</div>
            </div>
            <div class="progbox">
                <label for="p1"><img src="./prog/1.jpg" class="progcard"></label>
                <label for="p2"><img src="./prog/2.png" class="progcard"></label>
                <label for="p3"><img src="./prog/3.jpg" class="progcard"></label>
                <label for="p4"><img src="./prog/4.png" class="progcard"></label>
                <label for="p5"><img src="./prog/5.jpg" class="progcard"></label>
                <label for="p6"><img src="./prog/6.jpg" class="progcard"></label>
                <label for="p7"><img src="./prog/7.jpg" class="progcard"></label>
                <label for="p8"><img src="./prog/8.jpg" class="progcard"></label>                
            </div>
        </div>
    </div>

    <div class="calSection">
        <div class="calCon">
            <div class="title">
                <div class="en">CALENDER</div>
                <div class="Bt">행사 달력</div>
            </div>
            <div class="cal-select">
                <div class="select-box">
                    <select id="year">
                        <option value="2025">2025</option>
                        <option value="2026" selected>2026</option>
                        <option value="2027">2027</option>
                    </select>

                    <select id="month">
                        <option value="1">1월</option>
                        <option value="2">2월</option>
                        <option value="3">3월</option>
                        <option value="4" selected>4월</option>
                        <option value="5">5월</option>
                        <option value="6">6월</option>
                        <option value="7">7월</option>
                        <option value="8">8월</option>
                        <option value="9">9월</option>
                        <option value="10">10월</option>
                        <option value="11">11월</option>
                        <option value="12">12월</option>
                    </select> 
                </div>
                <div class="year-month">2026년 4월</div>
            </div>
            <div class="cal-box">
                <div class="calender">
                    <div>일</div>
                    <div>월</div>
                    <div>화</div>
                    <div>수</div>
                    <div>목</div>
                    <div>금</div>
                    <div>토</div>
                </div>

                <div class="calender-row">
                    <div class="day not-selected">29</div>
                    <div class="day not-selected">30</div>
                    <div class="day not-selected">31</div>
                    <div class="day"><div>1</div>전시[책피는숙련도서관] 4월 북큐레이션</div>
                    <div class="day">2</div>
                    <div class="day"><div>3</div>전시[책피는숙련도서관] 4월 북큐레이션</div>
                    <div class="day">4</div>
                </div>
                <div class="calender-row">
                    <div class="day">5</div>
                    <div class="day"><div>6</div>휴관 정기휴관일</div>
                    <div class="day">7</div>
                    <div class="day">8</div>
                    <div class="day">9</div>
                    <div class="day"><div>10</div>숙련기술인과의 만남</div>
                    <div class="day">11</div>
                </div>
                <div class="calender-row">
                    <div class="day">12</div>
                    <div class="day"><div>13</div>휴관정기휴관일</div>
                    <div class="day">14</div>
                    <div class="day">15</div>
                    <div class="day">16</div>
                    <div class="day"><div>17</div>행사 책읽는 숙련광장<br>행사 기능 책마당<br>행사 책읽는 숙련기술<br>전시 [책피는 숙련기술도서관] 4월 북큐레이션</div>
                    <div class="day">18</div>
                </div>
                <div class="calender-row">
                    <div class="day">19</div>
                    <div class="day"><div>20</div>휴관정기휴관일</div>
                    <div class="day"><div>21</div>행사 숙련기술 책마당<br>행사 책읽는 맑은냇가<br>행사 책읽는 숙련광장<br>전시 [책피는 숙련기술도서관] 4월 북큐레이션</div>
                    <div class="day">22</div>
                    <div class="day">23</div>
                    <div class="day">24</div>
                    <div class="day">25</div>
                </div>
                <div class="calender-row">
                    <div class="day">26</div>
                    <div class="day">27</div>
                    <div class="day">28</div>
                    <div class="day">29</div>
                    <div class="day">30</div>
                    <div class="day not-selected">1</div>
                    <div class="day not-selected">2</div>
                </div>                
            </div>
        </div>
    </div>

    <input type="radio" name="bookslide" id="bs1" checked hidden>
    <input type="radio" name="bookslide" id="bs2" hidden>

    <div class="bookSlider">
        <div class="bookcon">
            <div class="title">
                <div class="en">RECOMENDED BOOKS</div>
                <div class="Bt">추천 도서</div>
            </div>
            <div class="bookslide-wrapper">
                <div class="totalbooknum"><span></span>/7</div>
                <div class="bookslides">
                    <div class="bookpage page1">
                        <div class="bslide">
                            <div class="booknum">추천도서1</div>
                            <div class="slideimg"><img src="./rec/추천도서1.jpg" alt=""></div>
                            <div class="bookcont">
                                <div class="btitle">나에게 나다움을 주기로 했다 : 나다움을 찾아가는 다섯 가지 마음 습관</div>
                                <div class="bauthor">지은이 : 고정욱</div>
                            </div>
                        </div>
                        <div class="bslide">
                            <div class="booknum">추천도서2</div>
                            <div class="slideimg"><img src="./rec/추천도서2.jpg" alt=""></div>
                            <div class="bookcont">
                                <div class="btitle">여름이 반짝</div>
                                <div class="bauthor">지은이 : 김수빈</div>
                            </div>
                        </div>
                        <div class="bslide">
                            <div class="booknum">추천도서3</div>
                            <div class="slideimg"><img src="./rec/추천도서3.jpg" alt=""></div>
                            <div class="bookcont">
                                <div class="btitle">사랑 한 꼬집을 넣으면</div>
                                <div class="bauthor">지은이 : 배리 팀스</div>
                            </div>
                        </div>
                        <div class="bslide">
                            <div class="booknum">추천도서4</div>
                            <div class="slideimg"><img src="./rec/추천도서4.jpg" alt=""></div>
                            <div class="bookcont">
                                <div class="btitle">정말 정말 소리 지르고 싶어!</div>
                                <div class="bauthor">지은이 : 사이먼 필립</div>
                            </div>
                        </div>
                    </div>

                    <div class="bookpage page2">
                        <div class="bslide">
                            <div class="booknum">추천도서5</div>
                            <div class="slideimg"><img src="./rec/추천도서5.jpg" alt=""></div>
                            <div class="bookcont">
                                <div class="btitle">힐빌리의 노래 : 위기의 가정과 문화에 대한 회고</div>
                                <div class="bauthor">지은이 : J.D 밴스</div>
                            </div>
                        </div>
                        <div class="bslide">
                            <div class="booknum">추천도서6</div>
                            <div class="slideimg"><img src="./rec/추천도서6.jpg" alt=""></div>
                            <div class="bookcont">
                                <div class="btitle">(허영만의) 커피 한잔 할까요?</div>
                                <div class="bauthor">지은이 : 허영만</div>
                            </div>
                        </div>
                        <div class="bslide">
                            <div class="booknum">추천도서7</div>
                            <div class="slideimg"><img src="./rec/추천도서7.jpg" alt=""></div>
                            <div class="bookcont">
                                <div class="btitle">두더지의 여름: 김상근 그림책</div>
                                <div class="bauthor">지은이 : 김상근</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bookcontrol control1">
                <label for="bs1" class="arrow a1">&lt;</label>
                <label for="bs1" class="arrow a2">&gt;</label>
            </div>
            <div class="bookcontrol control2">
                <label for="bs2" class="arrow a1">&lt;</label>
                <label for="bs2" class="arrow a2">&gt;</label>
            </div>

            <div class="pagination">
                <span class="current"></span> / <span class="total">2</span>
            </div>

        </div>
    </div>

    <div class="footer">
        <div class="f-top">
            <div class="f-left">
                <div class="logo f-logo">스킬스북도서관</div>
                <i class="fab fa-youtube fa-2x"></i>
                <i class="fab fa-twitter fa-2x"></i>
                <i class="fab fa-facebook fa-2x"></i>
            </div>
            <div class="f-middle">
                <div>문의전화안내</div>
                <div>1644-8000</div>
                <div>운영시간(평일) 09:00~18:00</div>
            </div>
            <div class="f-right">
                <div>인천시 부평구 무네미로 448번길 77</div>
                <div>한국산업인력공단 글로벌숙련기술진흥원</div>
            </div>
        </div>
        <div class="f-bottom">
            <div>COPYRIGHTⓒ 2016 HRDKOREA</div>
        </div>
    </div>
</body>
</html>