// 変数numに0〜50までの整数をランダムに代入する
let num = Math.floor(Math.random() * 50) + 1;

// 変数numの値を出力する（確認用）
console.log(num);

// 変数numが3と5の倍数の時「3と5の倍数です」と出力する
if (num % 15 === 0) {
    console.log('3と5の倍数です');
}

// 変数numが3の倍数の時「3の倍数です」と出力する
else if (num % 3 === 0) {
    console.log('3の倍数です');
}

// 変数numが5の倍数の時「5の倍数です」と出力する
else if (num % 5 === 0) {
    console.log('5の倍数です');
}

// いずれにも該当しない時は変数numを出力する
else {
    console.log(num);
}