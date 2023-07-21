// SRキャラが増えた場合はsrCharaにキャラ名を追加し、追加した数をsrTotalに加える。
// 他レアも同様
// 現在の確率：UR3%, SSR18%, SR79%

// -応用編-　一枠SSR以上確定11連ガチャ

const chara = [];
const charaUr = [];

// SRキャラ、現在10キャラ
const srChara = ['イヅナ','獏','狒狒','枕返し','垢嘗め','天邪鬼','あずき洗い','禰々子河童','木の葉天狗','さざえ鬼'];
// SSRキャラ、現在11キャラ
const ssrChara = ['一本だたら','猫又','一反木綿','絡新婦','けうけげん','鈴鹿御前','貂','鎌鼬','馬頭','牛頭','蒼坊主'];
// URキャラ、現在25キャラ
const urChara = ['ぬりかべ','子泣き爺','のっぺらぼう','朱の盆','毛倡妓','覚','鉄鼠','倉ぼっこ','魔魅','鬼童丸','アマビエ','茨城童子','雪女','百々目鬼','金華猫','清姫','鴉天狗','白狼天狗','舞首','牛鬼','狂骨','猩猩','金狐','銀狐','天井嘗め'];

// 1回目のレア度決定の際に用いる
const srProb = 78;      // SRの確率は79%
const ssrProb = 96;     // SSRの確率は96-78=18%、URは残りの99-96=3%

// 2回目のキャラ決定の際に用いる（キャラ数を定義）
const srTotal = 10;     // SRキャラ10体
const ssrTotal = 11;     // SSRキャラ11体
const urTotal = 25;      // URキャラ25体

// ガチャ結果
const tenResult = document.getElementById('ten-result');
const urResult = document.getElementById('ur-result');

// ガチャボタン・リセットボタン
const tenBtn = document.getElementById('ten-btn');
const urBtn = document.getElementById('ur-btn');


/* ----------------------------------------------------
    10連ガチャ
---------------------------------------------------- */

tenBtn.addEventListener('click',() => {
    for (let i = 0; i < 10; i++) {
        let randomRareNum = Math.floor(Math.random() * 100);        // 0~99までの乱数を代入
        if (randomRareNum <= srProb){
            let randomSrNum = Math.floor(Math.random() * srTotal);  // 82以下の場合：SRキャラを数字に見立てて乱数を代入
            chara.push('SR' + srChara[randomSrNum]);                // 配列chara[]に排出キャラを追加する
            console.log(randomRareNum);
            console.log(randomSrNum);
        }
        else if (randomRareNum <= ssrProb) {
            let randomSsrNum = Math.floor(Math.random() * ssrTotal);
            chara.push('SSR' + ssrChara[randomSsrNum]);
            console.log(randomRareNum);
            console.log(randomSsrNum);
        }
        else {
            let randomUrNum = Math.floor(Math.random() * urTotal);
            chara.push('UR' + urChara[randomUrNum]);
            console.log(randomRareNum);
            console.log(randomUrNum);
        }

        tenResult.textContent = chara.join(' , ');                     // 排出キャラを全て表示
    }
}, {once:true});                                                       // 一度だけ実行（2回以上押しても処理をしない）


/* ----------------------------------------------------
    UR出るまで連続ガチャ
---------------------------------------------------- */

urBtn.addEventListener('click',() => {
    let count = 1;
    let randomNum = Math.floor(Math.random() * 100);
    while (randomNum < ssrProb) {
        randomNum = Math.floor(Math.random() * 100);    // 83以上が出るまで乱数を代入
        count++;                                        // ガチャ回数をカウント
        console.log(randomNum);
    }
    let randomUr = Math.floor(Math.random() * urTotal); // 83以上が出たらURキャラを数字に見立てて乱数を代入
    charaUr.push('UR' + urChara[randomUr]);             // 排出キャラが決まる

    urResult.textContent = charaUr.join();              // 排出キャラを表示

    const times = document.getElementById('times');
    times.textContent = count;                          // ガチャ回数を表示
 
});

