import pyuca


word = input('โปรดใส่ตัวอักษร โดยเว้นวรรคคำด้วยช่องว่าง:')
new_word = word.split(" ")
s_correct = sorted(new_word,  key = pyuca.Collator().sort_key)
print(s_correct)



