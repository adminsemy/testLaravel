<template>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">ID заказа</th>
                <th scope="col">Наименование продукта</th>
                <th scope="col">Имя поставшика</th>
                <th scope="col">Цена</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>            
                <tr v-for="(product, i) in products.data" :key="product.id">
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.vendor.name }}</td>
                    <td>
                        <input :id="product.id"
                        type="text"
                        name="price"
                        class="form-control is-invalid"
                        @input="$v.products.data.$each[i].price.$touch()"
                        v-model="product.price"
                        >
                        <div class="invalid-feedback"
                        v-if="!$v.products.data.$each[i].price.required"
                        >
                        Данное поле обязательно для заполнения
                        </div>
                        <div class="invalid-feedback"
                        v-if="!$v.products.data.$each[i].price.integer"
                        >
                        Поле должно содержать только число
                        </div>
                    </td>
                    <td><button class="btn btn-success"
                    @click="updatePrice(product.id, product.price)"
                    :disabled="$v.products.data.$each[i].price.$error"
                    >Изменить цену</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'
import { required, integer } from 'vuelidate/lib/validators'
export default {
    props: [
        'products'
    ],
    methods: {
        updatePrice(id, price) {
            console.log(this.$v);

            axios.post(`/api/product/${id}/price/${price}`).then((response) => {
                console.log(response.data.message);
            })
            .catch ((errors) => {
                console.log(errors);
            });
        }
    },
    validations: {
        products: {
            data: {
                $each: {
                    price: {
                        required,
                        integer
                    }
                }
            }
        }
    },
    created() {
        console.log(this.$v)
    }
}
</script> 