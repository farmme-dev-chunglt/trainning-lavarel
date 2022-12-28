<template>
  <div class="modal fade" id="modal-edit" aria-modal="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                  </div>
                  <div id="quickForm">
                    <Form
                      @submit="submit(dataProps.slug)"
                      :validation-schema="schema"
                      v-slot="{ errors }"
                      ref="form"
                    >
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <Field
                          type="text"
                          name="name"
                          class="form-control"
                          id="exampleInputEmail1"
                          placeholder="Enter email"
                          aria-describedby="exampleInputEmail1-error"
                          aria-invalid="true"
                          v-model="dataProps.name"
                          :rules="{ required: true,min: 6,max: 100  }"
                        />
                        <span id="exampleInputEmail1-error" class="error">
                          {{ errors.name }}
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <Field
                          type="text"
                          name="description"
                          class="form-control"
                          id="exampleInputEmail1"
                          placeholder="Enter email"
                          aria-describedby="exampleInputEmail1-error"
                          aria-invalid="true"
                          v-model="dataProps.description"
                          :rules="{ required: true, min: 6, max: 512 }"
                        />
                        <span id="exampleInputEmail1-error" class="error">
                          {{ errors.description }}
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <Field
                          type="number"
                          name="price"
                          class="form-control"
                          id="exampleInputEmail1"
                          placeholder="Enter email"
                          aria-describedby="exampleInputEmail1-error"
                          aria-invalid="true"
                          v-model="dataProps.price"
                          :rules="{ required: true, min: 0 }"
                        />
                        <span id="exampleInputEmail1-error" class="error">
                          {{ errors.price }}
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Discount</label>
                        <Field
                          type="text"
                          name="discount"
                          class="form-control"
                          id="exampleInputEmail1"
                          placeholder="Enter email"
                          aria-describedby="exampleInputEmail1-error"
                          aria-invalid="true"
                          v-model="dataProps.discount"
                          :rules="{ required: true }"
                        />
                        <span id="exampleInputEmail1-error" class="error">
                          {{ errors.discount }}
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Img</label>
                        <Field
                          type="text"
                          name="imgUrl"
                          class="form-control"
                          id="exampleInputEmail1"
                          placeholder="Enter email"
                          aria-describedby="exampleInputEmail1-error"
                          aria-invalid="true"
                          v-model="dataProps.imgUrl"
                          :rules="{ required: true }"
                        />
                        <span id="exampleInputEmail1-error" class="error">
                          {{ errors.imgUrl }}
                        </span>
                      </div>
                      <div class="card-footer">
                        <button class="btn btn-primary">
                          Submit
                        </button>
                      </div>
                    </Form>
                  </div>
                </div>
              </div>
              <div class="col-md-6"></div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ['dataProps', 'typeButton'],
  methods: {
    submit(slug) {
      if (this.$props.typeButton === 'edit') {
        this.axios.put(`updateProduct/${slug}`, this.$props.dataProps).then((res) => {
          $('#modal-edit').modal('hide')
        })
      } else if (this.$props.typeButton === 'add') {
        this.axios.post('createProduct', this.$props.dataProps).then((res) => {
          $('#modal-edit').modal('hide')
        })
      }
      this.$refs.form.resetForm()
    }
  }
}
</script>
