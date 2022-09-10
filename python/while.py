

month = input("enter month: ")
i = ["jan", "feb", "mar"]

while True:
    if month in i:
      key = i.index(month)
    else:
      month = input("plaease enter valid month: ")



