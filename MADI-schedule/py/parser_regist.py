# import requests
# from bs4 import BeautifulSoup as BS
#
# r = requests.get("https://raspisanie.madi.ru/tplan/r/?task=7")
# html = BS(r.content, 'html.parser')
#
# for el in html.select(".comboGroup"):
#     title = el.select("ul > li")
#     print(title[0].text)
