<?php require_once 'db.php'; ?>
<?php
$popupstoday = db::fetchAll("select *  from popups where curdate() between start_day and end_day");
?>
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
    <input type="radio" name="" id="popupclose" hidden>
    <div class="popupcon">
        <div class="popup">
            <div class="ptop">2025년 지방기능경기대회 참가원서 접수 공고사항을 아래 같이 알려드립니다.</div>
            <div class="imgbox"><img src="./images/images (101).jpg" alt=""></div>
            <div class="pbottom">
                <p>□ 접수기간 : 2025. 1. 13.(월) ～ 1. 24.(금) 18:00 마감 [12일간]</p>
                <p>□ 대상직종 : 웹디자인및개발 등 48개 직종</p>
                <p>□ 접수방법 : 마이스터넷 홈페이지 인터넷 접수</p>
            </div>
            <div class="popclose"><label for="popupclose">닫기</label></div>
        </div>
    </div>
    <?php foreach($popupstoday as $p): ?>
        <input type="radio" name="" id="popup<?= $p->id ?>" hidden>
        <div class="popupcon">
            <div class="popup">
                <div class="ptop"><?= $p->title ?></div>
                <div class="imgbox"><img src="./images/<?= $p->img ?>" alt=""></div>
                <div class="pbottom">
                    <?= $p->content ?>
                </div>
                <div class="popclose"><label for="popup<?= $p->id ?>">닫기</label></div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- 헤더 -->
    <?php require_once 'header.php' ?>
    <!-- 베너 -->
    <div class="banner">
        <div class="slide">
            <div class="bg">
                <div class="text">
                    <p class="bigText">Discover. Learn. Grow</p>
                    <p class="smallText">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, voluptatibus.</p>
                </div>
                <div class="circles">
                    <div class="circle c1"></div>
                    <div class="circle c2"></div>
                    <div class="circle c3"></div>
                </div>
            </div>
            <div class="bg">
                <div class="text">
                    <p class="bigText">Open Your Mind Here</p>
                    <p class="smallText">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, voluptatibus.</p>
                </div>
                <div class="circles">
                    <div class="circle c1"></div>
                    <div class="circle c2"></div>
                    <div class="circle c3"></div>
                </div>
            </div>
            <div class="bg">
                <div class="text">
                    <p class="bigText">Books for Every Journey</p>
                    <p class="smallText">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, voluptatibus.</p>
                </div>
                <div class="circles">
                    <div class="circle c1"></div>
                    <div class="circle c2"></div>
                    <div class="circle c3"></div>
                </div>                
            </div>
            <div class="bg">
                <div class="text">
                    <p class="bigText">Discover. Learn. Grow.</p>
                    <p class="smallText">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, voluptatibus.</p>
                </div>
                <div class="circles">
                    <div class="circle c1"></div>
                    <div class="circle c2"></div>
                    <div class="circle c3"></div>
                </div>                
            </div>
        </div>

        <div class="progress">
            <div class="prog-fill"></div>
        </div>
    </div>

    <!-- 소식 -->
    <input type="radio" name="notice" id="n1" hidden checked>
    <input type="radio" name="notice" id="n2" hidden>
    <input type="radio" name="notice" id="n3" hidden>
    <div class="noticeSection">
        <div class="noticeBox">
            <div class="title">
                <div class="en">LIBRARY NOTICE</div>
                <div class="ko">도서관소식</div>
            </div>
            <div class="noticeCon">
                <div class="noticeBtns">
                    <label for="n1" class="nbtn nb1">일반공지</label>
                    <label for="n2" class="nbtn nb2">행사안내</label>
                    <label for="n3" class="nbtn nb3">채용안내</label>
                </div>
                <div class="notice n1">
                    <div class="nrow">
                        <div class="ncont">더운 여름 힘내요 – 연구정보실 개실 6주년 기념이벤트 당첨자 발표</div>
                        <div class="ndate">2024-08-08</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">더운 여름 힘내요 – 연구정보실 개실 6주년 기념이벤트</div>
                        <div class="ndate">2024-07-24</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">연구자를 위한 텍스트 마이닝(심화) 교육생 모집 안내</div>
                        <div class="ndate">2024-07-17</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">「실감체험관」 전국민 소문내기 이벤트 당첨자 발표</div>
                        <div class="ndate">2024-06-10</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">디지털인문학과 네트워크 분석 교육생 모집 안내</div>
                        <div class="ndate">2024-05-14</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">스킬스북도서관 -「청년 디지털 봉사단 ‘잇(IT)다’5기」- 최종 합격자 발표</div>
                        <div class="ndate">2024-05-10</div>
                    </div>
                </div>
                <div class="notice n2">
                    <div class="nrow">
                        <div class="ncont">2024년 제9회 「월간 인문학을 만나다」 강연 안내</div>
                        <div class="ndate">2024-08-08</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">「스킬스북도서관이 간식박스 쏩니다!」7월 당첨 발표</div>
                        <div class="ndate">2024-08-07</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">별 헤는 「실감체험관」이벤트</div>
                        <div class="ndate">2024-07-25</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">2024년 제8회 「월간 인문학을 만나다」 강연 안내</div>
                        <div class="ndate">2024-07-15</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">스킬스북도서관이 간식박스 쏩니다!</div>
                        <div class="ndate">2024-07-02</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">2024년 제7회 「월간 인문학을 만나다」 강연 안내</div>
                        <div class="ndate">2024-07-01</div>
                    </div>
                </div>
                <div class="notice n3">
                    <div class="nrow">
                        <div class="ncont">2024년 사서직 공무원 경력경쟁채용 필기시험 정답가안 공개 및 이의제기 안내</div>
                        <div class="ndate">2024-08-03</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">스킬스북도서관 공무직 근로자(미화) 채용 서류전형 합격자 및 면접전형 공고</div>
                        <div class="ndate">2024-08-02</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">2024년도 사서직 공무원 경력경쟁채용 필기시험 일정 ‧ 장소 및 응시자 준수사항 공고</div>
                        <div class="ndate">2024-07-26</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">스킬스북도서관 공무직 근로자(미화) 채용공고(재재공고)</div>
                        <div class="ndate">2024-07-24</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">스킬스북도서관 국가서지과 공무직 근로자 채용 최종 합격자 공고</div>
                        <div class="ndate">2024-07-18</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">스킬스북도서관 국가서지과 기간제 근로자(휴직대체) 채용 최종합격자 공고</div>
                        <div class="ndate">2024-07-16</div>
                    </div>
                    <div class="nrow">
                        <div class="ncont">스킬스북도서관 국가서지과 공무직 근로자 채용 서류전형(1차) 합격자 발표 및 면접시험(2차) 계획 공고</div>
                        <div class="ndate">2024-07-05</div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <!-- 자주찾는 메뉴 -->
    <div class="menuSeaction">
        <div class="menuBox">
            <div class="menucon"><i class="fa fa-book fa-2x"></i>도서대출</div>
            <div class="menucon"><i class="fa fa-recycle fa-2x"></i>도서반납</div>
            <div class="menucon"><i class="fa fa-chair fa-2x"></i>좌석예약</div>
            <div class="menucon"><i class="fa fa-book-open fa-2x"></i>희망도서신청</div>
            <div class="menucon"><i class="fa fa-robot fa-2x"></i>AI추천도서</div>
            <div class="menucon"><i class="fa fa-bolt-lightning fa-2x"></i>전저도서관</div>
        </div>
    </div>
    <!-- 프로그램 -->
    <input type="checkbox" name="progcard" id="card1" hidden>
    <input type="checkbox" name="progcard" id="card2" hidden>
    <input type="checkbox" name="progcard" id="card3" hidden>
    <input type="checkbox" name="progcard" id="card4" hidden>
    <input type="checkbox" name="progcard" id="card5" hidden>
    <input type="checkbox" name="progcard" id="card6" hidden>
    <input type="checkbox" name="progcard" id="card7" hidden>
    <input type="checkbox" name="progcard" id="card8" hidden>
    <div class="progcard card1">
        <div class="prog">
            <div class="progheader">
                <div class="progtitle">피아니스트 김미정과 함께하는 힐링 클래식</div>
                <label for="card1" class="pclose">닫기</label>
            </div>
            <div class="progcont"><img src="./prog/1.jpg" alt=""></div>
        </div>
    </div>
    <div class="progcard card2">
        <div class="prog">
            <div class="progheader">
                <div class="progtitle">도란도란] 나를 찾아가는 마음챙김 그림책테라피</div>
                <label for="card2" class="pclose">닫기</label>
            </div>
            <div class="progcont"><img src="./prog/2.png" alt=""></div>
        </div>
    </div>
    <div class="progcard card3">
        <div class="prog">
            <div class="progheader">
                <div class="progtitle">신흥어울마당작은]2024년 하반기 프로그램 ' 뚝딱 한국사'</div>
                <label for="card3" class="pclose">닫기</label>
            </div>
            <div class="progcont"><img src="./prog/3.jpg" alt=""></div>
        </div>
    </div>
    <div class="progcard card4">
        <div class="prog">
            <div class="progheader">
                <div class="progtitle">[수주](성인)마을미디어 교육생 모집</div>
                <label for="card4" class="pclose">닫기</label>
            </div>
            <div class="progcont"><img src="./prog/4.png" alt=""></div>
        </div>
    </div>
    <div class="progcard card5">
        <div class="prog">
            <div class="progheader">
                <div class="progtitle">나를 치유하는 명화</div>
                <label for="card5" class="pclose">닫기</label>
            </div>
            <div class="progcont"><img src="./prog/5.jpg" alt=""></div>
        </div>
    </div>
    <div class="progcard card6">
        <div class="prog">
            <div class="progheader">
                <div class="progtitle">[문화가 있는 날] 푸른 하늘이 좋아요!</div>
                <label for="card6" class="pclose">닫기</label>
            </div>
            <div class="progcont"><img src="./prog/6.jpg" alt=""></div>
        </div>
    </div>
    <div class="progcard card7">
        <div class="prog">
            <div class="progheader">
                <div class="progtitle">책 속에서 사람을 만나다 </div>
                <label for="card7" class="pclose">닫기</label>
            </div>
            <div class="progcont"><img src="./prog/7.jpg" alt=""></div>
        </div>
    </div>
    <div class="progcard card8">
        <div class="prog">
            <div class="progheader">
                <div class="progtitle">서울 문화의 밤(8월) 행사 - 국지승 그림책 작가와 방구석 북토크</div>
                <label for="card8" class="pclose">닫기</label>
            </div>
            <div class="progcont"><img src="./prog/8.jpg" alt=""></div>
        </div>
    </div>
    <div class="progSection">
        <div class="progBox">
            <div class="title">
                <div class="en">PROGRAM</div>
                <div class="ko">프로그램</div>
            </div>
            <div class="progCon">
                <label for="card1" class="progimg"><img src="./prog/1.jpg" alt="프로그램1"><p class="ptitle">피아니스트 김미정과 함께하는 힐링 클래식</p></label>
                <label for="card2" class="progimg"><img src="./prog/2.png" alt="프로그램2"><p class="ptitle">도란도란] 나를 찾아가는 마음챙김 그림책테라피</p></label>
                <label for="card3" class="progimg"><img src="./prog/3.jpg" alt="프로그램3"><p class="ptitle">신흥어울마당작은]2024년 하반기 프로그램 ' 뚝딱 한국사'</p></label>
                <label for="card4" class="progimg"><img src="./prog/4.png" alt="프로그램4"><p class="ptitle">[수주](성인)마을미디어 교육생 모집</p></label>
                <label for="card5" class="progimg"><img src="./prog/5.jpg" alt="프로그램5"><p class="ptitle">나를 치유하는 명화</p></label>
                <label for="card6" class="progimg"><img src="./prog/6.jpg" alt="프로그램6"><p class="ptitle">[문화가 있는 날] 푸른 하늘이 좋아요!</p></label>
                <label for="card7" class="progimg"><img src="./prog/7.jpg" alt="프로그램7"><p class="ptitle">책 속에서 사람을 만나다</p></label>
                <label for="card8" class="progimg"><img src="./prog/8.jpg" alt="프로그램8"><p class="ptitle">서울 문화의 밤(8월) 행사 - 국지승 그림책 작가와 방구석 북토크</p></label>
            </div>
        </div>
    </div>

    <!-- 달력 -->

    <div class="calenderSection">
        <div class="calenderBox">
            <div class="title">
                <div class="en">EVENT CALENDER</div>
                <div class="ko">행사달력</div>
            </div>
            <div class="calcon">
                <div class="calselect">
                    <div class="calselects">
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
                    <div class="calinfo">
                        <div class="year">2026</div>
                        <div class="month">4월</div>                        
                    </div>
                </div>
                <div class="calender">
                    <div class="caltop">
                        <div>일</div>
                        <div>월</div>
                        <div>화</div>
                        <div>수</div>
                        <div>목</div>
                        <div>금</div>
                        <div>토</div>
                    </div>
                    <div class="calbottom">
                        <div class="calrow">
                            <div class="days">1 <div>전시[책피는숙련도서관] 4월 북큐레이션</div></div>
                            <div class="days">2</div>
                            <div class="days">3 <div>전시[책피는숙련도서관] 4월 북큐레이션</div></div>
                            <div class="days">4</div>
                            <div class="days">5</div>
                            <div class="days">6 <div>휴관 정기휴관일</div></div>
                            <div class="days">7</div>
                        </div>
                        <div class="calrow">
                            <div class="days">8</div>
                            <div class="days">9</div>
                            <div class="days">10 <div>숙련기술인과의 만남</div></div>
                            <div class="days">11</div>
                            <div class="days">12</div>
                            <div class="days">13 <div>휴관정기휴관일</div></div>
                            <div class="days">14</div>
                        </div>
                        <div class="calrow">
                            <div class="days">15</div>
                            <div class="days">16</div>
                            <div class="days">17 <div>행사 책읽는 숙련광장 <br> 행사 기능 책마당 <br> 행사 책읽는 숙련기술 <br> 전시 [책피는 숙련기술도서관] 4월 북큐레이션</div></div>
                            <div class="days">18</div>
                            <div class="days">19</div>
                            <div class="days">20 <div>휴관정기휴관일</div></div>
                            <div class="days">21 <div>행사 숙련기술 책마당 <br> 행사 책읽는 맑은냇가 <br> 행사 책읽는 숙련광장 <br> 전시 [책피는 숙련기술도서관] 4월 북큐레이션</div></div>
                        </div>
                        <div class="calrow">
                            <div class="days">22</div>
                            <div class="days">23</div>
                            <div class="days">24</div>
                            <div class="days">25</div>
                            <div class="days">26</div>
                            <div class="days">27</div>
                            <div class="days">28</div>
                        </div>
                        <div class="calrow">
                            <div class="days">29</div>
                            <div class="days">30</div>
                            <div class="days">31</div>
                            <div class="days nextm">1</div>
                            <div class="days nextm">2</div>
                            <div class="days nextm">3</div>
                            <div class="days nextm">4</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="radio" name="recSection" id="bs1" hidden>
    <input type="radio" name="recSection" id="bs2" hidden>
    <input type="radio" name="recSection" id="bs3" hidden>
    <input type="radio" name="recSection" id="bs4" hidden>
    <input type="radio" name="recSection" id="bs5" hidden>
    <input type="radio" name="recSection" id="bs6" hidden>
    <input type="radio" name="recSection" id="bs7" hidden>
    <input type="radio" name="recSection" id="bs8" hidden>
    <input type="radio" name="recSection" id="bs9" hidden>
    <input type="radio" name="recSection" id="bs10" hidden>
    <input type="radio" name="recSection" id="bs11" hidden>
    <input type="radio" name="recSection" id="bs12" hidden>
    <input type="radio" name="recSection" id="bs13" hidden>
    <input type="radio" name="recSection" id="bs14" hidden>
    <div class="recSection">
        <div class="recBox">
            <div class="title">
                <div class="en">RECOMMENDED BOOKS</div>
                <div class="ko">추천도서</div>
            </div>
            <div class="books">                
                <div class="recbook">
                    <div class="rLeft">
                        <img src="./rec/추천도서1.jpg" alt="">
                    </div>
                    <div class="rRight">
                        <div class="retop">
                            <div class="bookNum">추천도서</div>
                        </div>
                        <div class="remid">
                            <div class="retext">
                                <div class="btitle">나에게 나다움을 주기로 했다 : 나다움을 찾아가는 다섯 가지 마음 습관</div>
                                <div class="author">지은이 : 고정욱</div>
                                <div class="bcont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium maxime nesciunt quidem ab sint nostrum qui tempora eveniet dignissimos ipsam aspernatur velit culpa, rem saepe ea earum laudantium pariatur illum.</div>
                            </div>
                        </div>
                        <div class="rbottom">
                            <div class="rebtns">
                                <label for="bs1">←</label>
                                <div class="pagination">
                                    <span class="curpage"></span> / <span class="totalpage">7</span>
                                </div>
                                <label for="bs2">→</label>                            
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="recbook">
                    <div class="rLeft">
                        <img src="./rec/추천도서2.jpg" alt="">
                    </div>
                    <div class="rRight">
                        <div class="retop">
                            <div class="bookNum">추천도서</div>
                        </div>
                        <div class="remid">
                            <div class="retext">
                                <div class="btitle">여름이 반짝</div>
                                <div class="author">지은이 : 김수빈</div>
                                <div class="bcont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium maxime nesciunt quidem ab sint nostrum qui tempora eveniet dignissimos ipsam aspernatur velit culpa, rem saepe ea earum laudantium pariatur illum.</div>
                            </div>
                        </div>
                        <div class="rbottom">
                            <div class="rebtns">
                                <label for="bs3">←</label>
                                <div class="pagination">
                                    <span class="curpage"></span> / <span class="totalpage">7</span>
                                </div>
                                <label for="bs4">→</label>                            
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="recbook">
                    <div class="rLeft">
                        <img src="./rec/추천도서3.jpg" alt="">
                    </div>
                    <div class="rRight">
                        <div class="retop">
                            <div class="bookNum">추천도서</div>
                        </div>
                        <div class="remid">
                            <div class="retext">
                                <div class="btitle">사랑 한 꼬집을 넣으면</div>
                                <div class="author">지은이 : 배리 팀스</div>
                                <div class="bcont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium maxime nesciunt quidem ab sint nostrum qui tempora eveniet dignissimos ipsam aspernatur velit culpa, rem saepe ea earum laudantium pariatur illum.</div>
                            </div>
                        </div>
                        <div class="rbottom">
                            <div class="rebtns">
                                <label for="bs5">←</label>
                                <div class="pagination">
                                    <span class="curpage"></span> / <span class="totalpage">7</span>
                                </div>
                                <label for="bs6">→</label>                            
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="recbook">
                    <div class="rLeft">
                        <img src="./rec/추천도서4.jpg" alt="">
                    </div>
                    <div class="rRight">
                        <div class="retop">
                            <div class="bookNum">추천도서</div>
                        </div>
                        <div class="remid">
                            <div class="retext">
                                <div class="btitle">정말 정말 소리 지르고 싶어!</div>
                                <div class="author">지은이 : 사이먼 필립</div>
                                <div class="bcont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium maxime nesciunt quidem ab sint nostrum qui tempora eveniet dignissimos ipsam aspernatur velit culpa, rem saepe ea earum laudantium pariatur illum.</div>
                            </div>
                        </div>
                        <div class="rbottom">
                            <div class="rebtns">
                                <label for="bs7">←</label>
                                <div class="pagination">
                                    <span class="curpage"></span> / <span class="totalpage">7</span>
                                </div>
                                <label for="bs8">→</label>                            
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="recbook">
                    <div class="rLeft">
                        <img src="./rec/추천도서5.jpg" alt="">
                    </div>
                    <div class="rRight">
                        <div class="retop">
                            <div class="bookNum">추천도서</div>
                        </div>
                        <div class="remid">
                            <div class="retext">
                                <div class="btitle">힐빌리의 노래 : 위기의 가정과 문화에 대한 회고</div>
                                <div class="author">지은이 : J.D 밴스</div>
                                <div class="bcont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium maxime nesciunt quidem ab sint nostrum qui tempora eveniet dignissimos ipsam aspernatur velit culpa, rem saepe ea earum laudantium pariatur illum.</div>
                            </div>
                        </div>
                        <div class="rbottom">
                            <div class="rebtns">
                                <label for="bs9">←</label>
                                <div class="pagination">
                                    <span class="curpage"></span> / <span class="totalpage">7</span>
                                </div>
                                <label for="bs10">→</label>                            
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="recbook">
                    <div class="rLeft">
                        <img src="./rec/추천도서6.jpg" alt="">
                    </div>
                    <div class="rRight">
                        <div class="retop">
                            <div class="bookNum">추천도서</div>
                        </div>
                        <div class="remid">
                            <div class="retext">
                                <div class="btitle">(허영만의) 커피 한잔 할까요?</div>
                                <div class="author">지은이 : 허영만</div>
                                <div class="bcont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium maxime nesciunt quidem ab sint nostrum qui tempora eveniet dignissimos ipsam aspernatur velit culpa, rem saepe ea earum laudantium pariatur illum.</div>
                            </div>
                        </div>
                        <div class="rbottom">
                            <div class="rebtns">
                                <label for="bs11">←</label>
                                <div class="pagination">
                                    <span class="curpage"></span> / <span class="totalpage">7</span>
                                </div>
                                <label for="bs12">→</label>                            
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="recbook">
                    <div class="rLeft">
                        <img src="./rec/추천도서7.jpg" alt="">
                    </div>
                    <div class="rRight">
                        <div class="retop">
                            <div class="bookNum">추천도서</div>
                        </div>
                        <div class="remid">
                            <div class="retext">
                                <div class="btitle">두더지의 여름: 김상근 그림책</div>
                                <div class="author">지은이 : 김상근</div>
                                <div class="bcont">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium maxime nesciunt quidem ab sint nostrum qui tempora eveniet dignissimos ipsam aspernatur velit culpa, rem saepe ea earum laudantium pariatur illum.</div>
                            </div>
                        </div>
                        <div class="rbottom">
                            <div class="rebtns">
                                <label for="bs13">←</label>
                                <div class="pagination">
                                    <span class="curpage"></span> / <span class="totalpage">7</span>
                                </div>
                                    
                                <label for="bs14">→</label>                            
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</body>
</html>