const today = new Date();
const [year, month, day] = [
    today.getFullYear(),
    today.getMonth() + 1,
    today.getDate(),
];

console.log(year + '年' + month + '月' + day + '日');
