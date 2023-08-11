    <div class="container">
        <div class="row">
            <h1 class="mt-2">Московская Биржа | Фонды
                <a class="btn btn-primary btn-sm " href="#" onclick="return additem()" role="button">Новая ценная бумага</a>
            </h1><small class="" id="LastUid">Минаев Андрей Борисович</small>
         
        </div>
        <hr class="mt-1 mb-4">  

       <div class="row">
            <div class="col-4 mb-4" style="font-size:0.8rem">
                <table class="table table-sm table-hover table-bordered" id="index_table">
                    <colgroup>
                        <col width="60">
                        <col>
                    </colgroup>
                    <thead class="thead-inverse ">
                        <tr>
                            <th></th>
                            <th>Ценная бумага</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>


            <div class="col-8">
                <h5 class="alert-heading">
                    <div id="indextbl" hidden=""></div>
                    <div id="idkontr" hidden=""></div>
                    <div data-item="name" contenteditable="true"> АЛРОСА</div>
                       <a class="btn btn-primary btn-sm mb-4 pull-right" href="#" onclick="return saveitem()" role="button">Сохранить</a>
                </h5>
                <hr>
                <ul>
                    <li>Количество бумаг:</li>
                    <li>Стоимость бумаг</li>
                    <li>Проценты</li>
                </ul>

                <div class="alert alert-danger" role="alert">
                    <strong>Внимание !!! </strong>
                    <div data-item="alert" contenteditable="true"> Бумаги нужно продать!!!</div>
                </div>
                <ul class="nav nav-tabs mb-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="#descr" data-toggle="tab" role="tab" aria-controls="descr">Информация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events0" data-toggle="tab" role="tab" aria-controls="events0">События</a>
                    </li>

                </ul>

                <div class="tab-content mb-5" id="IndexContent">
                    <div class="tab-pane fade show active" id="descr" role="tabpanel" aria-labelledby="descr-tab">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning"><strong>Условия :</strong>
                                <div data-item="condition0" contenteditable="true">&nbsp;</div>
                            </li>
                            <li class="list-group-item list-group-item-warning"><strong> Лимит :</strong>
                                <div data-item="limit" contenteditable="true">&nbsp; </div>
                            </li>
                            <li class="list-group-item"><strong>Комментарий :</strong>
                                <div data-item="comment" contenteditable="true">Директор - Ирина Владимировна Рончка-8-909-496-22-88.</div>
                            </li>
                            <li class="list-group-item list-group-item-success"><strong>Телефоны :</strong>
                                <div data-item="phones" contenteditable="true">8-(878-2)- 26-32-51-раб.-1-ый магази; 25-01-77-2-ой магазин; 25-49-88-торг.зал 2-ого магаз
                            </li>
                            <li class="list-group-item"><strong>Контакты :</strong>
                                <div data-item="address" contenteditable="true">
                                    г.Черкесск ,ООО "Декамюр" <br>
                                    Адреса магаз.:369000,КЧР,г.Черкесск,ул. Первомайская,45-(1-й маг-н), ул.Первомайская,34 (2-ой магазин ""Жемчуг"). <br>
                                    Дом.адрес Ирины:ул.Балахонова,59( тел.на справке не значится). <br>
                                </div>
                            </li>

                            <li class="list-group-item list-group-item-info"><strong>email :</strong>
                                <div data-item="email" contenteditable="true">jemchug09@yandex.ru</div>
                            </li>



                        </ul>
                    </div>
                    <div class="tab-pane" id="events0" role="tabpanel" style="font-size:0.8rem">
                        <?php if ($this->model->contentEditable) : ?>
                            <a class="btn btn-primary btn-sm mb-4" href="#" onclick="return events0_tableAddRow()" role="button">Добавить событие</a>
                        <?php endif; ?>
                        <h7 id="eventsLastUid"></h7>
                        <hr>
                        <table class="table table-sm table-hover table-bordered" id="events0_table">
                            <thead class="thead-inverse ">
                                <tr>
                                    <th>Долг 1</th>
                                    <th>Долг 2</th>
                                    <th>Звонок</th>
                                    <th>Покупка</th>
                                    <th>Оплата</th>
                                    <th>Примечание</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>


                </div>

            </div>
        </div>
        <!-- /.row -->



    </div>
    <!-- /.container -->

    <script>
        function events0_tableAddRow() {
            index.events0.index = index.events0.rows().length;
            $.post('<?= URL ?>mp3/addevents', {
                id_mp3: index.row.id
            }, function(f) {
                if (f.status = "success") {
                    var row = {};
                    row.id = f.data.id;
                    row.id_mp3 = index.row.id;
                    row.uid = f.data.uid;
                    row.restime = '' + Date.now();
                    row.restime = row.restime.substring(row.restime.length, -3);
                    row.v1 = ' - ';
                    row.v2 = ' - ';
                    row.v3 = ' - ';
                    row.v4 = ' - ';
                    row.v5 = ' - ';
                    row.v6 = ' - ';
                    index.events0.row.add(row).draw();
                }
            }, 'json');
        }

        function loadevents0() {
            index.events0.clear().draw(true);
            $.post('<?= URL ?>mp3/load_events', {
                id_mp3: index.row.id
            }, function(f) {
                if (f.status == 'success') {
                    index.events0.rows.add(f.data).draw();
                }
            }, 'json');
        }


        function loadkontrs() {
            $.post('<?= URL ?>mp3/load_kontrs', {}, function(f) {
                if (f.status == 'success') {
                    index.table.rows.add(f.data).draw();
                }

            }, 'json');


        }

        function addkontr() {
            index.table.$('tr.selected').removeClass('selected');
            $('h5 > [data-item="name"]').text('Новый контрагент');
            $('h5 > [data-item="cod"]').text('0000');
            $('[data-item="alert"]').html(' - ');
            $('#idkontr').text('');
            $('#indextbl').text('-1');
            var $Descri = $('#descr [data-item]').html(' - ');
        }

        function savekontr() {
            var row = {};
            var indextbl = +$('#indextbl').text();
            row.id = $('#idkontr').text();

            row.name = $('h5 > [data-item="name"]').text();
            row.cod = $('h5 > [data-item="cod"]').text();
            row.restime = '' + Date.now();
            row.restime = (row.restime / 1000).toFixed();
            var $Descri = $('#descr [data-item]');
            row.descr = {};
            $.each($Descri, function(i, v) {
                row.descr[$(v).data('item')] = $(v).html();
            });
            row.descr.alert = $('[data-item="alert"]').html();

            $.post('<?= URL ?>mp3/change_kontr', {
                data: row
            }, function(f) {
                if (f.status == 'success') {
                    row.id = f.data.id;
                    row.user_id = f.data.user_id;
                    $('#idkontr').text(row.id);

                    if (indextbl != -1) {
                        index.table.row(indextbl).data(row).draw(false);
                        var tr0 = $('#index_table tbody > tr:eq(0)');
                        tr0.addClass('selected').css({
                            'background-color': '#a5e4a5'
                        });

                        (function(el) {
                            setTimeout(function(el) {
                                el.css({
                                    'background-color': ''
                                });
                            }, 1500, el);
                        })(tr0);
                    } else {

                        var newTr = index.table.row.add(row).draw().node();
                        var newIndex = index.table.row(newTr).index();

                        $('#indextbl').text(newIndex);
                        $(newTr).addClass('selected');
                    }
                } else {

                }
            }, 'json');



        }

        index = {};

        $(function() {
            $.fn.DataTable.ext.pager.numbers_length = 7;

            index.table = $('#index_table').DataTable({
                "language": {
                    "url": "<?= URL ?>public/js/datatables/Russian.json"
                },

                data: [],
                //"ajax": "<?= URL ?>mp3/loads_mp3/",
                "columns": [{
                        "data": "restime",
                        "bVisible": false,
                        "mRender": function(restime, type, full) {
                            if (type == 'display') {
                                var d = new Date(parseInt(restime * 1000));
                                return d.toLocaleDateString();
                            } else
                                return restime;
                        },
                    },
                    {
                        "data": "cod"
                    },
                    {
                        "data": "name"
                    },

                ],
                "initComplete": loadkontrs,
                "order": [
                    [0, "desc"]
                ],
                "aLengthMenu": [15, 50, 100],
                "sDom": '<"col-md-10 mb-2"l><"col-md-12"f><"top">t<"col-md-12"i><"col-md-12"p>'
            }).on('click', 'tbody>tr', function(e) {
                e.preventDefault();
                var tr = $(this);

                if (tr.hasClass('selected')) {
                    tr.removeClass('selected');
                } else {
                    index.table.$('tr.selected').removeClass('selected');
                    tr.addClass('selected');
                }

                var indextbl = index.table.row(tr).index();
                index.row = index.table.row(indextbl).data();

                $('#indextbl').text(indextbl);
                $('#idkontr').text(index.row.id);

                $('h5 > [data-item="name"]').text(index.row.name);
                $('h5 > [data-item="cod"]').text(index.row.cod);
                if (typeof index.row.descr.alert != 'undefined')
                    $('[data-item="alert"]').html(index.row.descr.alert);
                else $('[data-item="alert"]').text(' - ');

                var $Descri = $('#descr [data-item]');
                $.each($Descri, function(i, v) {
                    if (typeof index.row.descr[$(v).data('item')] != 'undefined')
                        $(v).html(index.row.descr[$(v).data('item')]);
                    else $(v).text(' - ');
                });
                $.post('<?= URL ?>mp3/getLastUid', {
                    id: index.row.user_id
                }, function(f) {
                    if (f.status == 'success') {
                        var d = new Date(parseInt(index.row.restime * 1000));
                        $('#LastUid').text(d.toLocaleDateString() + ' - ' + d.toLocaleTimeString() + ' - ' + f.data.uname);
                    } else {
                        $('#LastUid').text(' - ')
                    }
                    loadevents0();
                }, 'json');

            });
            /*	
                $('#descr [contentEditable="true"]').on('blur',function(e){
                    e.preventDefault();
                    t = $(this).find('span');
                    if(t){
                        $.each(t,function(i,v){
                            
                            
                        });
                        
                    }
                    $(this).text($(this).text());
                });
            */
            $(document).on('paste', '[contenteditable]', function(e) {
                e.preventDefault();
                var text = (e.originalEvent || e).clipboardData.getData('text/plain');
                window.document.execCommand('insertText', false, text);
            });

            index.events0 = $('#events0_table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                },
                data: [],
                //"ajax": "<?= URL ?>mp3/loads_mp3/",
                "columns": [{
                        "data": "v1",
                        "mRender": function(v1, type, full) {
                            return '<div data-item="v1" contenteditable="true" >' + v1 + '</div>';
                        },
                    },
                    {
                        "data": "v2",
                        "mRender": function(v2, type, full) {
                            return '<div data-item="v2" contenteditable="true" >' + v2 + '</div>';
                        },
                    },
                    {
                        "data": "v3",
                        "mRender": function(v3, type, full) {
                            return '<div data-item="v3" contenteditable="true" >' + v3 + '</div>';
                        },
                    },
                    {
                        "data": "v4",
                        "mRender": function(v4, type, full) {
                            return '<div data-item="v4" contenteditable="true" >' + v4 + '</div>';
                        },
                    },
                    {
                        "data": "v5",
                        "mRender": function(v5, type, full) {
                            return '<div data-item="v5" contenteditable="true" >' + v5 + '</div>';
                        },
                    },
                    {
                        "data": "v6",
                        "mRender": function(v6, type, full) {
                            return '<div data-item="v6" contenteditable="true" >' + v6 + '</div>';
                        },
                    },
                ],
                "ordering": false,
                "aLengthMenu": [15, 25, 50, 100],
                "sDom": '<"col-md-10 mb-2"l><"col-md-12"f><"top">t<"col-md-12"ip>'
            }) <?php if ($this->model->contentEditable) : ?>.on('keyup', 'td div[contenteditable="true"]', function(e) {
                    e.preventDefault();
                    if (e.keyCode == 113) {
                        var thatTr = $(this).closest('tr');
                        var title = $(this).data('item');
                        $(this).text(index.events0.row(thatTr).data()[title]);
                    }
                }).on('blur', 'td div[contenteditable="true"]', function(e) {
                    e.stopPropagation();

                    var that = $(this);
                    var thattd = that.parent();
                    var thatTr = that.closest('tr');
                    var newtext = that.text();
                    var title = that.data('item');
                    var newtitle = '';

                    var row = index.events0.row(thatTr).data();
                    newtitle = row[title];
                    index.events0.row(thatTr).data()[title] = newtext;


                    if (newtext && newtext != newtitle) {
                        $.post('<?= URL ?>mp3/change_events/', {
                            name: title,
                            data: row
                        }, function(f) {
                            if (f.status == "success") {
                                thattd.css({
                                    'background-color': '#a5e4a5'
                                });
                                (function(el) {
                                    setTimeout(function(el) {
                                        el.css({
                                            'background-color': ''
                                        });
                                    }, 1500, el);
                                })(thattd);
                            } else {
                                thattd.css({
                                    'background-color': '#f7ae6e'
                                });
                            }
                        }, 'json');
                    }

                }) <?php else : ?>.on('click', 'tr', function(e) {
                    e.preventDefault();
                    var thatTr = $(this);
                    var row = index.events0.row(thatTr).data();
                    $.post('<?= URL ?>mp3/getLastUid', {
                        id: row.uid
                    }, function(f) {
                        if (f.status == 'success') {
                            var d = new Date(parseInt(row.restime * 1000));
                            $('#eventsLastUid').text(d.toLocaleDateString() + ' - ' + d.toLocaleTimeString() + ' - ' + f.data.uname);
                        } else {
                            $('#LastUid').text(' - ')
                        }

                    }, 'json');
                }) <?php endif ?>;

        });
    </script>