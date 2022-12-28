<template>
  <AdminLayout>
    <div class="content">
      <div>
        <h1>Dashboard</h1>
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"></div>
        <div class="row">
          <div class="col-sm-8 col-md-2">
            <button
              type="button"
              class="btn btn-block btn-info"
              data-toggle="modal"
              data-target="#modal-edit"
              @click="sendData()"
            >
              Add
            </button>
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
                    <button
                      type="button"
                      class="btn btn-block btn-info"
                      data-toggle="modal"
                      data-target="#modal-edit"
                      @click="sendData(item, 'edit')"
                    >
                      Edit
                    </button>
                  </th>
                  <th>
                    <button
                      type="button"
                      class="btn btn-block btn-warning"
                      data-toggle="modal"
                      data-target="#modal-default"
                      @click="selectItem(item.slug)"
                    >
                      softDestroy
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
      <formProduct :dataProps="dataProps" @success="loadData" :typeButton="typeButton" />
      <popup @accept="accept" ref="popup" />
    </div>
  </AdminLayout>
</template>
<script>
import formProduct from './form.vue'
export default {
  components: {
    formProduct
  },
  data() {
    return {
      listProduct: [],
      loading: false,
      itemDelete: {},
      dataProps: {},
      pageCount: 0,
      pageActive: 1,
      typeButton: ''
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
      this.axios.get(`getProduct?page=${this.pageActive}`).then((res) => {
        this.pageCount = res.data.data.last_page
        this.listProduct = res.data.data.data
        this.loading = true
      })
    },
    accept() {
      this.axios.delete(`softDelete/${this.itemDelete}`).then((res) => {
        this.loadData()
        $('#modal-default').modal('hide')
      })
    },
    selectItem(slug) {
      this.itemDelete = slug
    },
    sendData(item = {}, type = 'add') {
      this.typeButton = type
      this.dataProps = item
    },
    switchPage(currentPage) {
      this.pageActive = currentPage
    }
  }
}
</script>
