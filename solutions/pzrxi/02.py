
N = list(range(1,101))
primeList = []

# create prime number list
for i in N:
	if i > 1:
		for j in range(2,i):
			if i % j == 0:
				break
		else:
			primeList.append(i)

print("=== find addition pair of number in N list equal to prime number in N list ===")

for p in primeList:
	for i in N:
		for j in N:
			if i + j == p and i < j:
				print(i , " + ", j , " = " , p)

print("=== find subtraction pair of number in N list equal to prime number in N list ===")
		
for p in primeList:
	for i in N:
		for j in N:
			if i - j == p:
				print(i , " - ", j , " = " , p)
			
