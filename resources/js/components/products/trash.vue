<template>
  <AdminLayout>
    <div class="content">
      <h1>Dashboard</h1>
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"></div>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div id="example1_filter" class="dataTables_filter">
            <label
              >Search:
              <input
                type="search"
                class="form-control form-control-sm"
                placeholder=""
                aria-controls="example1"
              />
            </label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <table
            id="example1"
            class="table table-bordered table-striped dataTable dtr-inline"
            aria-describedby="example1_info"
            v-if="loading"
          >
            <thead>
              <tr>
                <th
                  class="sorting sorting_asc"
                  tabindex="0"
                  aria-controls="example1"
                  rowspan="1"
                  colspan="1"
                  aria-sort="ascending"
                  aria-label="Rendering engine: activate to sort column descending"
                >
                  Id
                </th>
                <th
                  class="sorting"
                  tabindex="0"
                  aria-controls="example1"
                  rowspan="1"
                  colspan="1"
                  aria-label="Browser: activate to sort column ascending"
                >
                  Name
                </th>
                <th
                  class="sorting"
                  tabindex="0"
                  aria-controls="example1"
                  rowspan="1"
                  colspan="1"
                  aria-label="Platform(s): activate to sort column ascending"
                >
                  Description
                </th>
                <th
                  class="sorting"
                  tabindex="0"
                  aria-controls="example1"
                  rowspan="1"
                  colspan="1"
                  aria-label="Engine version: activate to sort column ascending"
                >
                  Price
                </th>
                <th
                  class="sorting"
                  tabindex="0"
                  aria-controls="example1"
                  rowspan="1"
                  colspan="1"
                  aria-label="CSS grade: activate to sort column ascending"
                >
                  Discount
                </th>
                <th
                  class="sorting"
                  tabindex="0"
                  aria-controls="example1"
                  rowspan="1"
                  colspan="3"
                  aria-label="CSS grade: activate to sort column ascending"
                >
                  Btn
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in listProduct" :key="item.id">
                <th>{{ item.id }}</th>
                <th>{{ item.name }}</th>
                <th>{{ item.description }}</th>
                <th>{{ item.price }}</th>
                <th>{{ item.discount }}</th>
                <th>
                  <button class="btn btn-block btn-primary" @click="restore(item.slug)">
                    Restore
                  </button>
                </th>
                <th>
                  <button class="btn btn-block btn-danger" @click="deleteTrash(item.slug)">
                    Delete
                  </button>
                </th>
              </tr>
            </tbody>
          </table>
          <div v-else>Loading ...</div>
        </div>
      </div>
      <paginate
        v-model="page"
        :page-count="pageCount"
        :click-handler="switchPage"
        :prev-text="'Prev'"
        :next-text="'Next'"
        :container-class="'paginate'"
      >
      </paginate>
    </div>
  </AdminLayout>
</template>
<script>
export default {
  data() {
    return {
      listProduct: [],
      loading: false,
      pageCount: 0,
      pageActive: 1
    }
  },
  created() {
    this.loadData()
  },
  watch: {
    pageActive() {
      this.loadData()
    }
  },
  methods: {
    loadData() {
      this.axios.get('getTrash?page=1').then((res) => {
        this.listProduct = res.data.data
        this.pageCount = res.data.last_page
        this.loading = true
      })
    },
    restore(slug) {
      this.axios.get(`restore/${slug}`).then((res) => {
        this.loadData()
      })
    },
    deleteTrash(slug) {
      this.axios.get(`deleteTrash/${slug}`).then((res) => {
        this.loadData()
      })
    },
    switchPage(currentPage) {
      this.pageActive = currentPage
    }
  }
}
</script>
