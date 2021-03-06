import requests
from bs4 import BeautifulSoup
page = requests.get("https://wiki.stardewvalley.net/Stardew_Valley_Wiki")
soup = BeautifulSoup(page.content, 'html.parser')

wikilinks = []
for con in soup.find_all('div', class_="mainmenuwrapper"):
    for links in soup.find_all('a', href=True):
        if links.text:
            wikilinks.append(links['href'])

# print(wikilinks)


with open("./scrapeNews/output.txt", "w") as f:
    for item in wikilinks:
        if not str(item).startswith("/"):
            continue
        f.write("%s\n" % item)
