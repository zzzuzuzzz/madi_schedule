const axios = require('axios');
const cheerio = require('cheerio');

axios.get('https://raspisanie.madi.ru/tplan/r/?task=7').then(html => {
    const $ = html.data
    console.log($)
})