# Monitoring Balai Bendungan

Monitoring Balai Bendungan merupakan suatu sistem aplikasi yang menampilkan real time data keamanan sebuah bendungan. 
Data tersebut antara lain : tinggi muka air, tekanan air pori, curah hujan, dan screenshot CCTV.
Aplikasi ini dibangun dengan framework codeigniter, grocery crud dan dengan bantuan flot.js untuk menampilkan grafik.

Sistem aplikasi ini terintegrasi dengan data logger yang sudah terpasang pada setiap lokasi bendungan dengan menggunakan jaringan gprs.
Data dikirim ke server yang kemudian akan didistribusikan ke database lokal pada masing masing wilayah.