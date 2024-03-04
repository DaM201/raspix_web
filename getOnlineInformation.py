import requests
def main(ip=""):
    def zjisti_informace_o_ip(ip_adresa):
        api_url = f"https://ipinfo.io/{ip_adresa}/json"
        odpoved = requests.get(api_url)
        if odpoved.status_code == 200:
            informace = odpoved.json()
            return informace
        else:
            return None

    informace_o_ip = zjisti_informace_o_ip(str(ip))

    if informace_o_ip:
        return f"""
   
CITY: {informace_o_ip.get('city')}
STATE: {informace_o_ip.get('region')}
COUNTRY: {informace_o_ip.get('country')}
COORDINATES: {informace_o_ip.get('loc')}
ORG: {informace_o_ip.get('org')}
POSTAL: {informace_o_ip.get('postal')}
TIMEZONE: {informace_o_ip.get('timezone')}
HOSTNAME: {informace_o_ip.get('hostname')}

"""
    else:
        print("Nepodařilo se získat informace o IP adrese.")