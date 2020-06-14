<template>
  <div>
    <div class="form-group row justify-content-center">

      <label for="client_email" class="col-md-2 align-self-center col-form-label text-md-right">E-mail Клиента</label>

      <div class="col-md-4 align-self-center">
          <input :id="order.client_email" type="text" name="client_email" class="form-control" :value="order.client_email" :autocomplete="order.client_email" autofocus>
          <span class="invalid-feedback" role="alert">
            <strong></strong>
          </span>
      </div>
    </div>  
    <div class="form-group row justify-content-center">
      <label for="partner_id" class="col-md-2 align-self-center col-form-label text-md-right">Партнер</label>

      <div class="col-md-4 align-self-center">
          <select class="custom-select form-control" :id="order.partner_id"  name="partner_id">
                      <option v-for="partner in partners"
                      :key="partner.id"
                      v-bind="{ selected: partner.id === order.partner_id }"
                      :value="partner.id"
                      >{{ partner.name }}
                      </option>
              @endforeach
          </select>
      </div>
    </div>
    <div class="form-group row justify-content-center">
      <div class="card col-md-6 align-self-center">
        <div class="card-header text-center">Список продуктов</div>
      <div class="card-body">
        <div class="row" v-for="product in products" :key="product.id">
          <label class="col-md-4 text-md-right">{{ product.product.name }}</label>
          <div class="col-md-2">
            <input :id="product.id"
            type="text"
            :name="'product[' + product.product.id + ']'"
            class="form-control"
            v-model="product.quantity"
            @input="sumOrder"
            >
            <span class="invalid-feedback" role="alert">
              <strong></strong>
            </span>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="form-group row justify-content-center">
      <label class="col-md-2 align-self-center col-form-label text-md-right">Итого:</label>
      <label class="col-md-2 align-self-center col-form-label text-md-right">{{ sum }}</label>
    </div>  
    <div class="form-group row justify-content-center">
      <label for="status" class="col-md-2 align-self-center col-form-label text-md-right">Статус</label>

      <div class="col-md-4 align-self-center">
          <select class="custom-select form-control" :id="order.status"  name="status">
                      <option v-for="(statusName, statusCode) in status"
                      :key="statusCode"
                      v-bind="{ selected: statusCode == order.status }"
                      :value="statusCode"
                      >{{ statusName }}
                      </option>
              @endforeach
          </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    'order',
    'partners',
    'products',
    'status',
  ],
  data() {
    return {
      sum: 0
    }
  },
  methods: {
    sumOrder() {
      this.sum = 0;
      this.products.forEach(product => {
        this.sum += product.price * product.quantity;
      });
    }
  },
  mounted() {
    this.sumOrder();
  }
}
</script>