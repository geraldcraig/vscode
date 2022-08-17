try:
    value = input("value")
    print(int(value)/len(value))
except ValueError:
    print("bad")
except ZeroDivisionError:
    print("very bad")
except TypeError:
    print("very very")
except:
    print("boo")