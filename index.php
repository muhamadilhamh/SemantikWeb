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
                <v-btn href="about.html" class="btn" text>About Teknik Informatika</v-btn>
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
                <v-col lg="3" v-if="showFilter">
                  <p class="filter">Jenis Matkul</p>
                  <v-autocomplete clearable small-chips dense outlined rounded :items="jenisMatkul" v-model="selected_jenisMatkul" item-text="name" item-value="name" @change="getMatkul(selected_jenisMatkul)">
                  </v-autocomplete>
                </v-col>
                <v-col lg="3" v-if="showFilter">
                  <p class="filter">Semester</p>
                  <v-autocomplete clearable small-chips dense outlined rounded :items="semester" v-model="selected_semester" item-text="name" item-value="name" @change="getMatkul(selected_semester)">
                  </v-autocomplete>
                </v-col>
                <v-col lg="3" v-if="showFilter">
                  <p class="filter">Jumlah sks</p>
                  <v-autocomplete clearable small-chips dense outlined rounded :items="sks" v-model="selected_sks" item-text="name" item-value="name" @change="getMatkul(selected_sks)">
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
                        Jenis Mata Pelajaran :
                      </v-card-title>
                      <v-card-subtitle>
                        <h4 class="bg_jenisMatkul">{{item.jenisMatkul}}</h4>
                      </v-card-subtitle>
                      <v-divider></v-divider>
                      <v-card-title>
                        Dosen Pengajar :
                      </v-card-title>
                      <v-card-subtitle>
                        <h4 class="bg_dosen">{{item.dosenPengajar}}</h4>
                      </v-card-subtitle>
                      <v-divider></v-divider>
                      <v-card-title>
                        Jumlah Sks:
                      </v-card-title>
                      <v-card-subtitle>
                        <h4 class="bg_sks">{{item.jumlahSks}}</h4>
                      </v-card-subtitle>
                      <v-divider></v-divider>
                      <v-card-title>
                        Semester:
                      </v-card-title>
                      <v-card-subtitle>
                        <h4 class="bg_semester">{{item.semester}}</h4>
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
                          <v-card-text>
                            {{item.deskripsi}}
                          </v-card-text>
                          <v-divider></v-divider>
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
    </v-app>
  </div>
  <footer>&copy; MataKuliah</footer>



</body>
<style>
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
    width: 50px;
    text-align: center;
    color: white;
  }

  .bg_semester {
    background-color: rgb(0, 110, 255);
    border-radius: 10px;
    width: 90px;
    text-align: center;
    color: white;
  }

  .bg_dosen {
    background-color: rgb(0, 110, 255);
    border-radius: 10px;
    width: 250px;
    text-align: center;
    color: white;
  }

  .bg_jenisMatkul {
    background-color: rgb(0, 110, 255);
    border-radius: 10px;
    width: auto;
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
      selected_sks: '',
      sks: [{
          name: "1 sks",
        },
        {
          name: "2 sks",
        },
        {
          name: "3 sks",
        },
        {
          name: "7 sks"
        },

      ],
      selected_semester: '',
      semester: [{
          name: "Semester 1",
        },
        {
          name: "Semester 2",
        },
        {
          name: "Semester 3",
        },
        {
          name: "Semester 4",
        },
        {
          name: "Semester 5",
        },
        {
          name: "Semester 6",
        },
        {
          name: "Semester 7",
        },
        {
          name: "Semester 8",
        },
      ],
      selected_jenisMatkul: '',
      jenisMatkul: [{
          name: "Wajib"
        },
        {
          name: "Peminatan"
        },
      ],
      listToShow: 6,
      loadList: false,
      input: '',
      matkul_data: [],
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
        return Object.values(this.matkul_data).slice(0, this.listToShow)
      }
    }
  });
</script>
</body>

</html>