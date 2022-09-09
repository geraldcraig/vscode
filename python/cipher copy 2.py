from curses.ascii import isalpha


text = input("Enter word to cipher: ")
month = input("enter birth month: ")
cipher = ''

print(month.isalpha())


if (month == "jan" or month == "january"):
    num = 1
elif month == "february":
    num = 2
elif month == "march":
    num = 3
elif month == "april":
    num = 4
elif month == "may":
    num = 5
elif month == "june":
    num = 6  
elif month == "july":
    num = 7 
elif month == "august":
    num = 8 
elif month == "september":
    num = 9
elif month == "october":
    num = 10 
elif month == "november":
    num = 11
elif month == "december":
    num = 12 
else:
    print("not valid")
 
