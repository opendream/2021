from functools import cmp_to_key
import unittest


def reorder_thai(text):
    def cmp_thai(a, b):
        a_order = ord(a[0])
        b_order = ord(b[0])
        if b[1] or a_order == b_order:
            return 0
        elif a_order > b_order:
            b[1] = True
            return 1
        elif a_order < b_order:
            b[1] = True
            return -1
    chars = [[c, False] for c in text]
    chars = sorted(chars, key=cmp_to_key(cmp_thai))
    return "".join([c[0] for c in chars])

def alpha_key(text):
    for char in text:
        char_order = ord(char)
        if char_order >= ord(u"ก") and char_order <= ord(u"ฮ"):
            return "%s%s" % (char, text)
    return text

def thai_sorted(input):
    items = [(text, (reorder_thai(alpha_key(text)))) for text in input]
    sorted_items = sorted(items, key=lambda item: item[1])
    sorted_texts = [item[0] for item in sorted_items]
    return sorted_texts


class Test(unittest.TestCase):

    def test1(self):
        input  = ["ไก่", "กา", "ขา", "แก", "แขวน", "เกีย"]
        output = ["กา", "เกีย", "แก", "ไก่", "ขา", "แขวน"]
        self.assertCountEqual(output, thai_sorted(input))

    def test2(self):
        input  = ["ขอ", "ให้", "เจริญ", "นะ", "จ๊ะ", "หนุ่ม", "สาว", "ทั้ง", "หลาย"]
        output = ["ขอ", "จ๊ะ", "เจริญ", "ทั้ง", "นะ", "สาว", "หนุ่ม", "หลาย", "ให้"]
        self.assertListEqual(output, thai_sorted(input))

    def test3(self):
        input  = ["เสือ", "สาว", "ใส่", "แว่น", "แวว", "วาว"]
        output = ["วาว", "แว่น", "แวว",  "สาว", "เสือ","ใส่"]
        self.assertListEqual(output, thai_sorted(input))


if __name__ == "__main__":
    unittest.main()
