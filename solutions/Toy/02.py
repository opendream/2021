# start 11.30 at 06/19/2021
# End 11.43 at 06/19/2021

# input 1 - 100
import math

def prime_number(p):
    temp = 2
    if p == 1:
        return False

    for i in range(0,int(math.sqrt(p))):
        if p % temp == 0 and p != temp:
            return False
        if temp == 2:
            temp = 3
        else:
            temp = temp + 2
    return True

def find_number_pairs(n):
    ans1 = []
    ans2 = []

    #หาคู่บวก หน้า -> ท้าย
    for i in range(0,len(n)):
        for j in range (i+1,len(n)):
            if (prime_number(n[i] + n[j])):
                ans1.append((n[i],n[j]))

    # หาคู่ลบ ท้าย -> หน้า
    for i in range(len(n)-1,-1,-1):
        for j in range (i-1,-1,-1):
            if (prime_number(n[i] - n[j])):
                ans2.append((n[i],n[j]))

    ans2.sort()
    print("คู่ตัวเลขทั้งหมดใน N ที่ บวก กันแล้วได้ผลลัพธ์เป็น จำนวนเฉพาะ: ", ans1)
    print("คู่ตัวเลขทั้งหมดใน N ที่ ลบ กันแล้วได้ผลลัพธ์เป็น จำนวนเฉพาะ: ", ans2)
    return 0

# test case (one case)
find_number_pairs([i for i in range(1,101)])