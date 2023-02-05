const quiz = [
  {
    quetion:
      "日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？",
    answers: ["約２８万人", "約７９万人", "約１８３万人"],
    corrects: "約７９万人",
    images:"./assets-ph1-website/img/quiz/img-quiz01.png",
    quotes: "経済産業省 2019年3月 - IT 人材需給に関する調査",
  },
  {
    quetion:
      "既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？",
    answers: ["INTECH", "BIZZTECH", "X-TECH"],
    corrects: "X-TECH",
    images:"./assets-ph1-website/img/quiz/img-quiz02.png",
    quotes: "",
  },
  {
    quetion: "IoTとは何の略でしょう？",
    answers: [
      "internet of things",
      "integrate into technology",
      "information on tools",
    ],
    corrects: "internet of things",
    images:"./assets-ph1-website/img/quiz/img-quiz03.png",
    quotes: "",
  },
  {
    quetion:
      "イギリスのコンピューター科学者であるギャビン・ウッド氏が提唱した、ブロックチェーン技術を活用した「次世代分散型インターネット」のことをなんと言うでしょう？",
    answers: ["society5.0", "cyphy", "SDGs"],
    corrects: "society5.0",
    images:"./assets-ph1-website/img/quiz/img-quiz04.png",
    quotes: "Society5.0 - 科学技術政策 - 内閣府",
  },
  {
    quetion:
      "イギリスのコンピューター科学者であるギャビン・ウッド氏が提唱した、ブロックチェーン技術を活用した「次世代分散型インターネット」のことをなんと言うでしょう？",
    answers: ["web3.0", "NFT", "メタバース"],
    corrects: "web3.0",
    images:"./assets-ph1-website/img/quiz/img-quiz05.png",
    quotes: "",
  },
  {
    quetion:
      "先進テクノロジー活用企業と出遅れた企業の収益性の差はどれくらいあると言われているでしょうか？",
    answers: ["約２倍", "約５倍", "約１１倍"],
    corrects: "約５倍",
    images:"./assets-ph1-website/img/quiz/img-quiz06.png",
    quotes: "Accenture Technology Vision 2021",
  },
];

function createQuiz(quetionId, quetionText, answer, quote, correct,image) {
  const noteHtml = quote
    ? `<div class="quetionone-quote">
      <h2>${quote}</h2>
  </div>`
    : "";

  const wrapper = document.querySelector(".js-wrapper");
  let quetion =
    `<section class="quetionone js-quiz">` +
    `<div class="quetionone-logo">` +
    `<h1>Q${quetionId}</h1>` +
    `</div>` +
    `<h1 class="quetionone-title" id="quetionone-titlejs">${quetionText}</h1>` +
    `<div class="quetionone-figure">` +
    // `<img class="quetionone-image" src="assets-ph1-website/img/quiz/img-quiz0${quetionId}.png" alt="">` +
    `<img class="quetionone-image" src="${image}"`+
    `</div>` +
    `<div class="quetiononeAnswer">` +
    `<div class="quetiononeAnswer-logo">` +
    `<h1>A</h1>` +
    `</div>` +
    `<ul class="quetiononeAnswer-list wu">` +
    `<li><button class="js-answer">${answer[0]}</button></li>` +
    `<li><button class="js-answer">${answer[1]}</button></li>` +
    `<li><button class="js-answer">${answer[2]}</button></li>` +
    `</ul>` +
    `<div class="a_quizoneAnswer Adisplay-none">` +
    `<h1>正解</h1>` +
    `<p>A${correct}</p>` +
    `</div>` +
    `<div class="f_quizoneAnswer Fdisplay-none">` +
    `<h1>不正解</h1>` +
    ` <p>A${correct}</p>` +
    `</div>` +
    `${noteHtml}` +
    `</div>` +
    `</section> `;
  wrapper.insertAdjacentHTML("beforeend", quetion);
}

function shuffle(arr) {
  for (let i = arr.length - 1; i > 0; i--) {
    // i = ランダムに選ぶ終点のインデックス
    const j = Math.floor(Math.random() * (i + 1)); // j = 範囲内から選ぶランダム変数
    [arr[j], arr[i]] = [arr[i], arr[j]]; // 分割代入 i と j を入れ替える
  }
  return arr;
}

const allQuiz = shuffle(quiz);

allQuiz.forEach(function (maino, index) {
  createQuiz(
    index + 1,
    maino.quetion,
    maino.answers,
    maino.quotes,
    maino.corrects,
    maino.images
  );
  checkAnswer(index);
});

const setDisabled = (answers) => {
  answers.forEach((answer) => {
    answer.disabled = true;
  });
}; // buttonタグにdisabledを付与

// 各問題の中での処理
function checkAnswer(index) {
  const allQuiz = document.querySelectorAll(".js-quiz");
  allQuiz.forEach((test,number) => {
    const answers = test.querySelectorAll(".js-answer");
    const correctBox = test.querySelector(".a_quizoneAnswer");
    const incorrectBox = test.querySelector(".f_quizoneAnswer");
    answers.forEach((answer) => {
      answer.addEventListener("click", (e) => {
        answer.classList.add("is-selected");
        setDisabled(answers);
        if (e.target.textContent === quiz[number].corrects) {
          correctBox.classList.remove("Adisplay-none");
        } else if (e.target.textContent !== quiz[number].corrects) {
          incorrectBox.classList.remove("Fdisplay-none");
        }
      });
    });
  });
}


const burger =document.querySelector('.burger');
const nav =document.querySelector('.main-nav');

burger.addEventListener('click',()=>{
  nav.classList.toggle("nav-active")
});
