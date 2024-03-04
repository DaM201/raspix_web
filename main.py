import msg
import getOnlineInformation

old_in_the_file = ""
in_the_file = ""
msg.w("The File: system_information.txt will be restarted")

with open("system_information.txt", "r+") as file:
    file.write("")
    file.seek(0)
    old_in_the_file = file.read()

msg.i("Listening to PHP SERVER")

while True:
    with open("system_information.txt", "r") as file:
        in_the_file = file.read()

    if not in_the_file == old_in_the_file:
        new_content = in_the_file.replace(old_in_the_file, "")
        print(new_content.strip())
        if "NEW CONNECTION:\nIP adresa klienta: " in new_content:
            none, ip = new_content.split("NEW CONNECTION:\nIP adresa klienta: ")
            ip, none = ip.split("\nUser-Agent:")
            information = getOnlineInformation.main(ip=str(ip))

            with open("system_information.txt", "+a") as f:
                f.write(information)
            in_the_file += str(information)
            new_content += str(information)

            print(information)

            old_in_the_file = in_the_file
