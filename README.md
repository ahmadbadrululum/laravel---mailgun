Mailing list pada laravel

1. install laravel fresh / projcect yang sudah ada

2. emailnya kita menggunakan mailgun -> 10rb emaiil gratis 
https://app.mailgun.com/app/dashboard
#--konsep dari mailgun ini 
	a. setip user yg mendaftar akan terdaftar di mailgun enggak terdaftar di website kita ( OPSIONAL AJA) 
	b. setiap kita mengirim email ke banyak orang kita cukup ngitim email ke satu id si mailgunnya
 --. mendaftar di mailist MAILING LIST
mailist@sandboxbcf622cd3a8f4e358c2669853f224590.mailgun.org
Info: Successfully created mailing list.
Details
Alias Address
mailist@sandboxbcf622cd3a8f4e358c2669853f224590.mailgun.org
Name
mailist
Description
mailist desc
Access Level
Read Only

3. Menggunakan guzzle-> HTTP client y digunakan untuk memudahkan http request ke client 
http://docs.guzzlephp.org/en/stable/
-> Install guzzle di project laravel
ng  

--- didatas untuk persiapannya
##WORKFLOW DARI PROJECTNYA
1. Halaman berisi
	Checkbox, user bisa memilih h

2. Harus tau apakah user udah subscribe atau belum
	KALAU UDAH otomatis dichecklist untuk checkboxnya
	a. cek lewat api mailgun
	b. cek didatabase sendiri local ( menyediakan database untuk mailgunnya)

Didatabase local user udah subscribe mailist / belum mailist defaultnya (0, 1)

3. Testing email berhasil dikirim atau enggak 

1. migrasi database default tambahkan mailist
2. make auth