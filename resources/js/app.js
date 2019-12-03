/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


$('#edit_type').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var type = button.data('type')
    var amount3 = button.data('amount3')
    var amount12 = button.data('amount12')
    var amount24 = button.data('amount24')
    var id = button.data('id')

    console.log(type + " " + amount3 + " " + amount12 + " " + amount24 + " " + id);
    var modal = $(this)
    modal.find('.modal-body #type').val(type);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #amount3').val(amount3);
    modal.find('.modal-body #amount12').val(amount12);
    modal.find('.modal-body #amount24').val(amount24);

});

$('#delete_type').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var type = button.data('type')
    var amount = button.data('amount')
    var id = button.data('id')

    console.log(type + " " + amount + " " + id);
    var modal = $(this)
    modal.find('.modal-body #type').val(type);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #amount').val(amount);
    
});


$('#edit_assist').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var name = button.data('name')
    var id = button.data('id')


    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
});

$('#delete_assist').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var name = button.data('name')
    var id = button.data('id')


    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
});

$("#description").change(function(){
    var id = $("#description").val();
    $.get('/ajax-amount?id=' + id,function(data){
        console.log(data);
        var amount3 = data[0].amount3;
        var amount12 = data[0].amount12;
        var amount24 = data[0].amount24;
        $("#amount3_ajax").val(amount3);
        $("#amount12_ajax").val(amount12);
        $("#amount24_ajax").val(amount24);
    });
});

$("#new_description").change(function(){
    var id = $("#new_description").val();
    $.get('/ajax-amount-edit?id=' + id,function(data){
        console.log(data);
        var amount3 = data[0].amount3;
        var amount12 = data[0].amount12;
        var amount24 = data[0].amount24;
        $("#new_amount3_ajax").val(amount3);
        $("#new_amount12_ajax").val(amount12);
        $("#new_amount24_ajax").val(amount24);
    });
});

$('#edit_room').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var number = button.data('number')
    var desc = button.data('desc')
    var amount3 = button.data('amount3')
    var amount12 = button.data('amount12')
    var amount24 = button.data('amount24')

    var id = button.data('id')

    console.log(number + " " + amount + " " + id + "   " + desc);
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #number').val(number);
    
    modal.find('.modal-body #description_old').val(desc);
    modal.find('.modal-body #amount3_old').val(amount3);
    modal.find('.modal-body #amount12_old').val(amount12);
    modal.find('.modal-body #amount24_old').val(amount24);

    modal.find('.modal-body #amount_ajax').val(amount);

});


$('#delete_room').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var number = button.data('number')
    var desc = button.data('desc')
    var amount = button.data('amount')
    var id = button.data('id')


    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #room_num').text("Room #: " + number);
    modal.find('.modal-body #description').text("Room Description: " + desc);
    modal.find('.modal-body #amount').text("Amount of: " + amount);

});



$("#hours").change(function(){
    var value = $("#hours").val();
    var txt = $( "#hours option:selected").text();
    var string1 = txt.split(' / ')[0];
    var string2= string1.split(' ')[2];
    var finalAmount= string2.split('.')[0];

    console.log(string2);


    $("#check_in_hours").val(value);
    $("#amount").val(finalAmount);
    
});


$(document).ready(function() {
    makeTimer();

    $(".btn-room").click(function(){

        $("#hours").empty();
        var divp = document.getElementById('div-picked');
        divp.style.display = 'block';
    
        var number = $(this).data('number');
        var id = $(this).data('id');
        
        $("#roomid").val(id);
        $("#roomz").val(number);
    
        document.getElementById('room_numberrr').innerHTML = number;
    
        $.get('/ajax-room?id=' + id,function(data){
            $("#hours").append('<option value="3"> P '+data[0].amount3+'.00 / 3 Hours</option>'+
            '<option value="12"> P '+data[0].amount12+'.00 / 12 Hours</option>'+
            '<option value="24"> P '+data[0].amount24+'.00 / 24 Hours</option>');
        });
    
        var value = $("#hours").val();
        var txt = $( "#hours").text();
        var finalAmount = txt.split(' / ')[0];
    
        $("#check_in_hours").val(value);
        $("#amount").val(finalAmount);
    });


    display = document.querySelector('#time');

    function makeTimer() {
        $("#table tr.item").each(function() {
            var ROOMid = $(this).find("#row_id").text();
            var checker = $(this).find("#checker").text();
            var divtimer = $(this).find("#tss");
            var setcheck =  $(this).find("#checker")

            var modalIsOpen = false
            $('#timeout').on('shown.bs.modal', function(e) { modalIsOpen = true;})
            $('#timeout').on('hidden.bs.modal', function(e) { modalIsOpen = false;})
            
            $.get('/get-time-out?id=' + ROOMid,function(data){
                hms = data[0].time_out + " GMT+08:00";
                var endTime = new Date(hms);			
                endTime = (Date.parse(endTime) / 1000);
                var now = new Date();
                now = (Date.parse(now) / 1000);
                var timeLeft = endTime - now;
                var days = Math.floor(timeLeft / 86400); 
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
            
                if(days == 0 && hours == 0 && 1 > minutes){
                    divtimer.text("TIME OUT kunu");
                }else if(0 > days){
                    divtimer.text("TIME OUT");
                    $("#timeout").modal('show');
                }else{
                    divtimer.text(hours + " Hours " + minutes + " minutes left.");
                }
            });
        });
        
    }
    setInterval(makeTimer, 600000);

    function runModal(){
        var modalIsOpen = false
        $('#timeout').on('shown.bs.modal', function(e) { modalIsOpen = true;})
        $('#timeout').on('hidden.bs.modal', function(e) { modalIsOpen = false;})

        if(!modalIsOpen){
            $("#timeout").modal('show');
        }else{
            $("#timeout").modal('hide');
        }
    }
});

