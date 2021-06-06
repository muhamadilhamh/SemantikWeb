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
        <v-flex class="pa-10 pb-8 text-center">
          <v-img class=" pict" src="./asset/tst4.svg" width="300"></v-img>
        </v-flex>
        <p class="title">Ada mata kuliah apa saja sih di Teknik Informatika</p>
      </div>
    </section>
    <!-- Form Search -->
    <v-container>
      <v-row>
        <v-col cols="12">
          <form @submit.prevent="submit">

            <v-text-field elevation="7" solo rounded tile label="Cari Data" color="primary" v-model="input" placeholder="Caro Data" @keypress.enter="show">
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
          <v-radio-group row @change="sortedItem = 'jenisMatkul'">
            <v-radio label="Ascending" value="asc" @click="sortType = 'asc'"></v-radio>
            <v-radio label="Descending" value="desc" @click="sortType = 'desc'"></v-radio>
          </v-radio-group>

        </v-container>

        <v-container>
          <v-row>
            <v-col v-for="(item,index) in filteredList" :key="index" cols="12" md="4">
              <v-col>
                <v-card outlined class="mx-auto rounded-lg">
                  <v-card-title>
                    Nama Mata Kuliah:
                  </v-card-title>
                  <v-card-subtitle>
                    <p>{{item.Matkul}}</p>
                  </v-card-subtitle>
                  <hr />

                  <v-card-title>
                    Jenis Mata Pelajaran :
                  </v-card-title>
                  <v-card-subtitle>
                    <p>{{item.jenisMatkul}}</p>
                  </v-card-subtitle>
                  <v-card-title>
                    Dosen Pengajar :
                  </v-card-title>
                  <v-card-subtitle>
                    <p>{{item.dosenPengajar}}</p>
                  </v-card-subtitle>
                  <v-card-title>
                    Jumlah Sks:
                  </v-card-title>
                  <v-card-subtitle>
                    <p>{{item.jumlahSks}}</p>
                  </v-card-subtitle>
                  <v-card-title>
                    Semester:
                  </v-card-title>
                  <v-card-subtitle>
                    <p>{{item.semester}}</p>
                  </v-card-subtitle>

                  <v-card-actions>

                    <template v-if="reveal != item.Matkul">
                      <v-btn class="btn" color="primary" text @click="reveal = item.Matkul">
                        <v-icon left>mdi-chevron-down</v-icon>
                        Detail Mata Kuliah
                      </v-btn>
                    </template>

                    <template v-if="reveal == item.Matkul">
                      <v-btn class="btn" color="orange lighten-2" text @click="reveal = false">
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
        </v-col>
      </v-row>

    </v-container>

  </div>
  <footer>&copy; MataKuliah</footer>

</body>
<style>
  .pict {
    left: 40%;
    right: 40%;

  }

  .title {
    font-size: 2rem;
    color: white;
    font-weight: 700;
    margin-left: 50px;
    text-align: center;
    margin-bottom: 50px;
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
      listToShow: 12,
      input: '',
      matkul_data: [],
      query: '',
      sortedItem: '',
      sortType: '',
      nodata: false
    },
    methods: {
      submit() {
        axios.post('proses.php', {
          data: this.input
        }).then(response => {
          this.matkul_data = response.data
        })
      }
    },
    created() {
      axios.get('proses.php', {
        data: this.input
      }).then(response => {
        this.matkul_data = response.data
      })
    },
    computed: {
      filteredList: function() {
        return Object.values(this.matkul_data).sort((p1, p2) => {
          if (this.sortedItem != 'Matkul' || this.sortedItem != 'jenisMatkul') {
            let modifier = 1;
            if (p1[this.sortedItem] < p2[this.sortedItem]) return -1 * modifier;
            if (p1[this.sortedItem] > p2[this.sortedItem]) return 1 * modifier;
            return 0;
          } else {}
        })
      }
    }
  });
</script>
</body>

</html>