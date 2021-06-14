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
            <v-flex class="pa-10 pb-1 text-center">
              <v-img class=" pict" src="./asset/tst4.svg" width="280"></v-img>
            </v-flex>
            <p class="tema">Ada mata kuliah apa saja sih di Teknik Informatika</p>
          </div>
        </section>
        <!-- Form Search -->
        <v-container>
          <v-row>
            <v-col cols="12">
              <form @submit.prevent="submit">
                <v-text-field elevation="7" solo clearable rounded tile label="Cari Data" color="primary" v-model="input" placeholder="Cari Data" @keypress.enter="show">
                  <template v-slot:append>
                    <v-btn class="btn" color="#90CAF9" type="submit" elevation="2">
                      <v-icon>mdi-magnify</v-icon>
                      Search
                    </v-btn>
                  </template>
                </v-text-field>
              </form>
            </v-col>

            <v-container>
              <h2 v-model="input">Keyword yang dicari</h2>
              <p> {{input}}</p>

            </v-container>



            <v-container>
              <v-row>
                <v-col lg="2">
                  <div class="clear">
                    <v-btn outlined rounded solo @click="
                showFilter =! showFilter;
              ">
                      <v-icon left> mdi-sort-variant </v-icon>
                      Filter
                    </v-btn>
                  </div>
                </v-col>
              </v-row>
              <v-row>
                <v-col lg="6" sm="12" v-if="showFilter">
                  <p class="filter"> Cari Berdasarkan Kategori Matkul</p>
                  <v-autocomplete clearable small-chips dense outlined rounded :items="jenisMatkul" v-model="selected_jenisMatkul" item-text="name" item-value="name" @change="getMatkul(selected_jenisMatkul)">
                  </v-autocomplete>
                </v-col>

              </v-row>
            </v-container>

            <v-container>
              <v-row>
                <v-col v-for=" (item,index) in filteredList" :key="index" cols="12" md="4">
                  <v-col>
                    <v-card outlined class="mx-auto rounded-lg">
                      <v-card-title>
                        Nama Mata Kuliah:
                      </v-card-title>
                      <v-card-subtitle>
                        <h2>{{item.Matkul}}</h2>
                      </v-card-subtitle>
                      <hr>

                      <v-card-title>
                        Jenis Mata Kuliah :
                      </v-card-title>
                      <v-card-subtitle>
                        <h4 class="bg_jenisMatkul">{{item.jenisMatkul}}</h4>
                      </v-card-subtitle>
                      <v-divider></v-divider>
                      <v-card-title>
                        Dosen Pengajar :
                      </v-card-title>
                      <v-card-subtitle>
                        <h4 class="bg_dosen">{{item.Dosen}}</h4>
                      </v-card-subtitle>
                      <v-divider></v-divider>
                      <v-card-title>
                        Jumlah Sks:
                      </v-card-title>
                      <v-card-subtitle>
                        <h4 class="bg_sks">{{item.Sks}}</h4>
                      </v-card-subtitle>
                      <v-divider></v-divider>
                      <v-card-title>
                        Semester:
                      </v-card-title>
                      <v-card-subtitle>
                        <h4 class="bg_semester">{{item.Semester}}</h4>
                      </v-card-subtitle>

                      <v-card-actions>

                        <template v-if="reveal != item.Matkul">
                          <v-btn class="btn" color="primary" text @click="reveal = item.Matkul">
                            <v-icon left>mdi-chevron-down</v-icon>
                            Detail Mata Kuliah
                          </v-btn>
                        </template>

                        <template v-if="reveal == item.Matkul">
                          <v-btn class="btn" color="primary" text @click="reveal = false">
                            <v-icon left>mdi-chevron-up</v-icon>
                            Back
                          </v-btn>
                        </template>
                      </v-card-actions>

                      <v-expand-transition>
                        <div v-if="reveal == item.Matkul">
                          <v-divider></v-divider>
                          <v-card-title>
                            Deskripsi
                          </v-card-title>
                          <v-card-text class="desc">
                            {{item.Desc}}
                          </v-card-text>
                          <v-divider></v-divider>
                          <v-card-title>
                            Praktikum
                          </v-card-title>
                          <v-card-text>
                            <h4 class="bg_semester">{{item.Prak}}</h4>
                          </v-card-text>
                          <v-divider></v-divider>
                          <v-card-title>
                            Syarat Ambil
                          </v-card-title>
                          <v-card-text>
                            <h4 class="bg_syarat">{{item.Syarat}}</h4>
                          </v-card-text>

                        </div>
                      </v-expand-transition>
                    </v-card>
                  </v-col>
                </v-col>
              </v-row>
            </v-container>
            <v-btn class="load_more" text large v-if="loadList == true" @click="listToShow += 6" block>
              Load More
            </v-btn>
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

  .footer {
    text-align: center;
    padding-top: 10px;
    color: white;
    font-weight: 500;
  }

  .pict {
    left: 40%;
    right: 40%;
  }

  .filter {
    font-size: 1.2rem;
    font-weight: 500;
    color: rgb(163, 143, 143);
  }


  .tema {
    font-size: 30px;
    text-align: center;
    color: white;
    font-weight: 700;
    margin-bottom: 100px;
  }

  .home {
    font-family: Poppins;
    font-weight: 400;
  }

  .bg_sks {
    background-color: rgb(0, 110, 255);
    border-radius: 10px;
    width: max-content;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
    color: white;
  }

  .desc {
    white-space: pre-line;
    font-size: 18px;
    letter-spacing: 1px;
    line-height: 25px;
  }

  .bg_semester {
    background-color: rgb(0, 110, 255);
    border-radius: 10px;
    width: max-content;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
    color: white;
  }

  .bg_syarat {
    background-color: rgb(0, 110, 255);
    border-radius: 10px;
    width: fit-content;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
    color: white;
  }

  .bg_dosen {
    background-color: rgb(0, 110, 255);
    border-radius: 10px;
    width: max-content;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
    color: white;
  }

  .bg_jenisMatkul {
    white-space: pre-line;
    background-color: rgb(0, 110, 255);
    border-radius: 10px;
    width: fit-content;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
    color: white;
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
    data: {
      reveal: [{

      }],
      showFilter: false,
      selected_jenisMatkul: '',
      jenisMatkul: [{
          header: 'Jenis Matkul'
        },
        {
          name: 'Wajib',
          group: 'Group 1'
        },
        {
          name: 'Peminatan',
          group: 'Group 1'
        },
        {
          divider: true
        },
        {
          header: 'Semester'
        },
        {
          name: 'Semester 1',
          group: 'Group 2'
        },
        {
          name: 'Semester 2',
          group: 'Group 2'
        },
        {
          name: 'Semester 3',
          group: 'Group 2'
        },
        {
          name: 'Semester 4',
          group: 'Group 2'
        },
        {
          name: 'Semester 5',
          group: 'Group 2'
        },
        {
          name: 'Semester 6',
          group: 'Group 2'
        },
        {
          name: 'Semester 7',
          group: 'Group 2'
        },
        {
          name: 'Semester 8',
          group: 'Group 2'
        },
        {
          divider: true
        },
        {
          header: 'Jumlah Sks'
        },
        {
          name: '1 sks',
          group: 'Group 3'
        },
        {
          name: '2 sks',
          group: 'Group 3'
        },
        {
          name: '3 sks',
          group: 'Group 3'
        },
        {
          name: '7 sks',
          group: 'Group 3'
        },
        {
          divider: true
        },
        {
          header: 'Praktikum'
        },
        {
          name: 'Memiliki Praktikum',
          group: 'Group 4'
        },
        {
          name: 'Tidak ada',
          group: 'Group 4'
        },

      ],

      listToShow: 6,
      loadList: false,
      input: '',
      matkul_data: [],
      selected: null,
      query: '',
      sortType: '',
      sortedItem: '',
      list: [],
    },
    methods: {
      getMatkul(value) {
        axios.post('proses.php', {
          data: value
        }).then(response => {
          this.matkul_data = response.data
        })

      },
      submit() {
        axios.post('proses.php', {
          data: this.input
        }).then(response => {
          this.matkul_data = response.data
        })
      },
    },

    created() {
      axios.get('proses.php', {
        data: this.input
      }).then(response => {
        this.loadList = true
        this.matkul_data = response.data
      })

    },
    computed: {
      filteredList: function() {
        return Object.values(this.matkul_data).slice(0, this.listToShow);
      }
    }
  });
</script>
</body>

</html>