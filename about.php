<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <title>Mata Kuliah</title>
</head>

<body>
  <div id="App">
    <v-app>
      <div class="home">
        <title>Teknik Informatika</title>
        <!-- Navbar -->
        <v-toolbar dense>
          <v-container>
            <v-toolbar-title>
              <v-card-action>
                <v-btn href="index.php" class="btn" text> Mata <b>Kuliah</b></v-btn>
              </v-card-action>
              <v-card-action>
                <v-btn href="about.php" class="btn" text>About Teknik Informatika</v-btn>
              </v-card-action>

            </v-toolbar-title>
          </v-container>
        </v-toolbar>

        <!-- Jumbotron-->
        <section>
          <div class="warna-bg">
            <v-container>
              <p class="heroes">Program studi Teknik Informatika mempelajari dan menerapkan prinsip-prinsip ilmu komputer dan analisa matematis untuk desain, pengembangan, pengujian, dan evaluasi perangkat lunak, sistem operasi dan kerja komputer. Pada prodi ini akan diajarkan mulai dari menghasilkan ide kreatif, kemudian merealisasikan ide tersebut, memecah fungsi-fungsi, dan menciptakan struktur instruksi yang sangat detil dalam bahasa pemrograman untuk mengajarkan komputer apa saja yang harus dilakukan. Mahasiswa Ilmu Komputer harus menjadi ahli dalam sistem operasi dan aplikasi untuk memastikan bahwa dasar sistem operasi bekerja dengan baik.</p>
            </v-container>
          </div>
        </section>

        <v-container>
          <h2 class="text-center">4 Pemintatan Studi</h2>
          <br>
          <v-row>
            <v-col>
              <v-card outlined class="rounded-xl">
                <v-container>
                  <v-card-title>
                    <h3 class="title_content">Ilmu Komputasi dan Metode Numerik (IKMN)</h3>
                  </v-card-title>

                  <v-card-text>
                    <p class="teks">Ilmu komputasi adalah bidang ilmu yang mempunyai perhatian pada penyusunan model matematika dan teknis penyelesaian numerik serta penggunaan komputer untuk menganalisis dan memecahkan masalah ilmiah. </p>
                  </v-card-text>
                </v-container>
              </v-card>
              <v-card outlined class="rounded-xl">
                <v-container>
                  <v-card-title>
                    <h3 class="title_content">Sistem Informasi dan Sistem Multimedia (SISM)</h3>
                  </v-card-title>

                  <v-card-text>
                    <p class="teks">Sistem Informasi menekankan pada kemampuan mahasiswa dalam merancang, mengembangkan, teknologi atau alat, media yang digunakan, prosedur yang terorganisir, serta sumber daya manusia yang didalamnya bekerja sebagai sebuah kombinasi membentuk sebuah sistem yang terorganisir </p>
                  </v-card-text>
                </v-container>
              </v-card>
              <v-card outlined class="rounded-xl">
                <v-container>
                  <v-card-title>
                    <h3 class="title_content">Sistem Cerdas dan Sistem Grafika (SCSG)</h3>
                  </v-card-title>

                  <v-card-text>
                    <p class="teks">Menekankan pada kemampuan mahasiswa dalam merancang, mengembangkan, kemampuan mesin atau sistem untuk beradaptasi dalam mencapai tujuan pada lingkungan yang dapat mempengaruhi perilaku sistem. Sebagai sistem yang mampu menirukan perilaku manusia, sistem mempunyai ciri khas yang menunjukkan kemampuan dalam hal; Menyimpan informasi, Menggunakan informasi yang dimiliki untuk melakukan suatu pekerjaan dan menarik kesimpulan, Beradaptasi dengan keadaan baru, Berkomunikasi dengan penggunanya. </p>
                  </v-card-text>
                </v-container>
              </v-card>
              <v-card outlined class="rounded-xl">
                <v-container>
                  <v-card-title>
                    <h3 class="title_content">Jaringan Komputer dan Komunikasi Data (JKKD)</h3>
                  </v-card-title>

                  <v-card-text>
                    <p class="teks">Jaringan komputer menekankan pada kemampuan mahasiswa dalam merancang, mengembangkan jaringan telekomunikasi yang memungkinkan antar komputer untuk saling berkomunikasi dengan bertukar data </p>
                  </v-card-text>
                </v-container>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
        <br>

        <v-container>
          <h2 class="text-center">Prospek kerja</h2>
          <br>
          <v-row>
            <v-col md="3" v-for="item in items" :key="item.id">
              <v-card-text class="text-center">
                <h3>{{item.title}}</h3>
                <v-icon large>mdi-briefcase-outline</v-icon>
              </v-card-text>

              <v-card-text class="text-center">
                <p>{{item.name}}</p>

              </v-card-text>
            </v-col>

          </v-row>
        </v-container>

      </div>
      <footer class="footer_bg">
        <p class="footer">&copy; MataKuliah</p>
      </footer>
    </v-app>

  </div>




</body>
<style>
  .footer_bg {
    background: linear-gradient(to right, rgb(0, 110, 255), rgba(2, 100, 229, 0.658));
    height: max-content;
    margin-top: 50px;
  }

  .heroes {
    font-size: 19px;
    text-align: center;
    color: white;
    font-weight: 600;
    padding-bottom: 20px;
    padding-top: 30px;
  }

  .footer {
    text-align: center;
    padding-top: 10px;
    color: white;
    font-weight: 500;
  }

  .home {
    font-family: Poppins;
    font-weight: 400;
  }

  .title_content {
    white-space: pre-line;
    font-size: 18px;
    letter-spacing: 1px;
    line-height: 25px;
  }




  .btn {
    text-transform: capitalize;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  var application = new Vue({
    el: '#App',
    vuetify: new Vuetify(),
    data() {
      return {
        items: [{
            id: 1,
            title: "#1",
            name: "Capacity Planning Supervisor",
          },
          {
            id: 2,
            title: "#2",
            name: "Database Administrator",
          },
          {
            id: 3,
            title: "#3",
            name: "Customer Service Supervisor",
          },
          {
            id: 4,
            title: "#4",
            name: "Data Communication Assistant manager",
          },
          {
            id: 5,
            title: "#5",
            name: "Hardware Installation Supervisor",
          },
          {
            id: 6,
            title: "#6",
            name: "System Administrator",
          },
          {
            id: 7,
            title: "#7",
            name: "Webmaster",
          },
          {
            id: 8,
            title: "#8",
            name: "Project Manager Applications",
          },
          {
            id: 9,
            title: "#9",
            name: "Project Manager Distributed Systems",
          },
          {
            id: 10,
            title: "#10",
            name: "Project Network Technical Services",
          },
          {
            id: 11,
            title: "#11",
            name: "Project Manager Implementation Deployment",
          },
          {
            id: 12,
            title: "#12",
            name: "Lain-lainnya",
          },
        ],
      };
    },
  });
</script>
</body>

</html>