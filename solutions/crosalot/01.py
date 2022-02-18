import unittest


def fizz_buzz(value):
    output = ""
    if value % 3 == 0:
        output += "Fizz"
    if value % 5 == 0:
        output += "Buzz"
    return output or value

class Test(unittest.TestCase):

    def test1(self):

        def i(index):
            return index - 1

        output = [fizz_buzz(value) for value in range(1, 101)]

        self.assertEqual(output[i(1)], 1)
        self.assertEqual(output[i(2)], 2)
        self.assertEqual(output[i(3)], "Fizz")
        self.assertEqual(output[i(4)], 4)
        self.assertEqual(output[i(5)], "Buzz")
        self.assertEqual(output[i(6)], "Fizz")
        self.assertEqual(output[i(7)], 7)
        self.assertEqual(output[i(8)], 8)
        self.assertEqual(output[i(9)], "Fizz")
        self.assertEqual(output[i(10)], "Buzz")
        self.assertEqual(output[i(11)], 11)
        self.assertEqual(output[i(12)], "Fizz")
        self.assertEqual(output[i(13)], 13)
        self.assertEqual(output[i(14)], 14)
        self.assertEqual(output[i(15)], "FizzBuzz")
        self.assertEqual(output[i(16)], 16)

if __name__ == "__main__":
    unittest.main()
