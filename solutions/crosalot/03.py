#!/usr/bin/env python3

from itertools import chain
from collections import Counter
import unittest


def char_counter(text):
    return ''.join(chain(*[[key, str(total)] for key, total in Counter(text).items()]))


class Test(unittest.TestCase):

    def test1(self):
        input  = "GOOGLE"
        output = "G2O2L1E1"
        self.assertEqual(output, char_counter(input))

    def test2(self):
        input  = "SCHOOL"
        output = "S1C1H1O2L1"
        self.assertEqual(output, char_counter(input))

    def test3(self):
        input  = "HELLOWORLD"
        output = "H1E1L3O2W1R1D1"
        self.assertEqual(output, char_counter(input))


if __name__ == "__main__":
    unittest.main()
