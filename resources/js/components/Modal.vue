<template>

    <div :id='id' class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" :style="css">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <slot name="bottom" ></slot>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        props:['id', 'title', 'css', ],

        components:{

        },

        data() {
            return {

                visible: true
            }

        },
        mounted(){


             $('.modal-body form').on('submit', function () {

                 $('input[name=_redirectBack]', this).remove();


                 const formData = new FormData(this); // reference to form element

                 const data = {}; // need to convert it before using not with XMLHttpRequest
                 for (let [key, val] of formData.entries()) {
                     Object.assign(data, { [key]: val })
                 }
                 console.log(this);
                 console.log(data);
                 axios.post($(this).attr('action'), data)

                     .then(response=>{

                         console.log(response);

                         $('.datatables').DataTable().draw();


                     });

                 return false;


             })

        },

        methods: {
            isVisible() {

                return this.visible
            }

        },
        computed: {


        }

    }
</script>

<style lang="scss">

    .modal-dialog{
        max-width: none;
    }
    .modal-lg {
        top:50%;

        .modal-content{
            height:100%;
        }
    }
    .modal-header{
        padding:15px 15px 0 15px;
    }
    .close{
        font-size: 40px;
    }
    .modal .bottom{

        position: absolute;
        bottom: 15px;
        right:15px;
    }

</style>