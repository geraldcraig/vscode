file = open("devices.txt", "a")
while True:
    input("enter a device name: ")
    newItem = input()
    if newItem == "exit":
        break
        print("all done")
    else:
        file.write(newItem + "\n")
           
file.close()