import sys
import pytrends
import json
import codecs
import datetime

from pytrends.request import TrendReq

args = sys.argv

num = 1

if(len(args) == 0):
    print("引数を入力してください")
    exit()
trends = TrendReq(hl='ja_JP', tz=360)
trends.build_payload(args, cat=0, timeframe='today 5-y', geo='JP', gprop='')
result = trends.related_queries()
print("データ型=%s" % type(result[args[1]]))
print("キーワード=%s" % args[1])

for w in args:
    if (w == 'googleTrends.py'): continue
    val = result[w]
    print("*** args %s ***" % w)
    print(val['top'])
    print("******")
    print(val['rising'])
