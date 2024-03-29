$(document).ready(function () {
    $.ajax({
        //fill years on page load
        url: 'main.php',
        data: 'function=get_years',
        success: function (data) {
            $("#godina").html(data);

            // });
            let year = 1988;
            let festival = 'Arsenal';
            let day = 1;
            //fill festivals on page load
            $.ajax({
                url: 'main.php',
                data: {
                    function: "get_festivals",
                    param: year
                },
                success: function (data) {
                    // console.log($("#festival").html(data));
                    // console.log(html(data));
                    $("#festival").html(data);
                    //fill days on page load
                    $.ajax({
                        url: 'main.php',
                        data: {
                            function: "get_days",
                            yr: year,
                            fest: festival
                        },
                        success: function (data) {
                            console.log($("#dan").html(data));
                            $("#dan").html(data);
                            //fill visitors on page load
                            $.ajax({
                                url: 'main.php',
                                data: {
                                    function: "get_names",
                                    year: year,
                                    fest: festival,
                                    day: day
                                },
                                success: function (data) {
                                    $("#names").html(data);
                                    //fill festivals table
                                    let name = $("#names")[0].rows[1].cells[1].innerHTML;
                                    $.ajax({
                                        url: 'main.php',
                                        data: {
                                            function: "get_visited",
                                            name: name,
                                            year: year,
                                            fest: festival,
                                            day: day
                                        },
                                        success: function (data) {
                                            $("#visitor").text("Poseceni festivali za: " + name);
                                            $("#festivals").html(data);

                                            $.ajax({
                                                url: 'main.php',
                                                data: {
                                                    function: "most_spent",
                                                    names: getNames()
                                                },
                                                success: function (data) {
                                                    console.log(nms);
                                                    $("#spent-most").html(data);
                                                    nms = [];

                                                }
                                            });
                                        }

                                    });
                                }

                            })
                        }
                    });
                }
            });
        }
    });
    $("#posFes").click(function () {
        let year = Number($("#posGod :selected").val());
        let fest = $("#posFes :selected").val();
        console.log(year,fest);
        $.ajax({

            url: 'main.php',
            data: {
                function: "fill_days",
                year: year,
                fest: fest
            },
            success: function (data) {
                $("#posDan").html(data);
            }

        })
    });
    $("#posGod").click(function () {
        let year = Number($("#posGod :selected").val());
        console.log(year);
        $.ajax({
            url: 'main.php',
            data: {
                function: "fill_festivals",
                year: year
            },
            success: function (data) {
                $("#posFes").html(data);

            }
        })
    });
    $("#showAddUsers").click(function () {
        if ($("#addUsers").css('display') == 'none') {
            $("#addUsers").show();
            $.ajax({
                url: 'main.php',
                data: {
                    function: "get_visitors"
                },
                success: function (data) {
                    $("#posetilac").html(data);
                    $.ajax({
                        url: 'main.php',
                        data: {
                            function: "fill_years"
                        },
                        success: function (data) {
                            $("#posGod").html(data);

                        }
                    })
                }
            })
        } else {
            $("#addUsers").hide();
        }
    });
    $("#showSelFest").click(function () {
        if ($("#selFest").css('display') == 'none') {
            $("#selFest").show();
        } else {
            $("#selFest").hide();
        }
    })

    $("#insertBtn").click(function () {
        let year = Number($("#posGod :selected").val());
        let fest = $("#posFes :selected").val();
        let name = $("#posetilac :selected").val();
        let day = $("#posDan :selected").val();
        let price = $("#cena").val();


        $.ajax({
            url:'main.php',
            data:{
                function: "insert",
                year:year,
                fest:fest,
                name:name,
                price:price,
                day:day
            },
            success:function(data){
                $("#status").html(data);
            }
        })
    });
    $("#godina").click(function () {
        let year = Number($("#godina option:selected").val());
        $.ajax({
            url: 'main.php',
            data: {
                function: "get_festivals",
                param: year
            },
            success: function (data) {
                $("#festival").html(data);
            }
        });
    });
    $("#festival").click(function () {
        let year = Number($("#godina option:selected").val());
        let festival = $("#festival option:selected").val();
        $.ajax({
            url: 'main.php',
            data: {
                function: "get_days",
                yr: year,
                fest: festival
            },
            success: function (data) {
                console.log($("#dan").html(data));
                $("#dan").html(data);
            }
        });
    });
    let nms = [];
    $("#dan").click(function () {
        console.log('triggered');
        let year = Number($("#godina").val());
        let fest = $("#festival").val();
        let day = Number($("#dan").val());
        console.log(day);
        if (day != NaN) {
            $.ajax({
                url: 'main.php',
                data: {
                    function: "get_names",
                    year: year,
                    fest: fest,
                    day: day
                },
                success: function (data) {
                    $("#names").html(data);
                    let name = $("#names")[0].rows[1].cells[1].innerHTML;
                    $.ajax({
                        url: 'main.php',
                        data: {
                            function: "get_visited",
                            name: name,
                            year: year,
                            fest: fest,
                            day: day
                        },
                        success: function (data) {
                            $("#visitor").text("Poseceni festivali za: " + name);
                            $("#festivals").html(data);
                            $.ajax({
                                url: 'main.php',
                                data: {
                                    function: "most_spent",
                                    names: getNames()
                                },
                                success: function (data) {
                                    console.log(nms);
                                    $("#spent-most").html(data);
                                    nms = [];

                                }
                            })
                        }
                    })
                }
            })
        }
    });
    $("table").on('click', 'td.name', function () {
        let year = Number($("#godina").val());
        let fest = $("#festival").val();
        let day = Number($("#dan").val());
        let name = $(this).text();
        $.ajax({
            url: 'main.php',
            data: {
                function: "get_visited",
                name: name,
                year: year,
                fest: fest,
                day: day
            },
            success: function (data) {
                $("#visitor").text("Poseceni festivali za: " + name);

                $("#festivals").html(data);
            }
        });
    });
    $("#search").keyup(function () {
        let searchText = $("#search").val();
        search(searchText);
        $.ajax({
            url: 'main.php',
            data: {
                function: "most_spent",
                names: getNames()
            },
            success: function (data) {
                console.log(nms);
                $("#spent-most").html(data);
                nms = [];

            }
        })
    });
    $("#search-btn").click(function () {
        let searchText = $("#search").val();
        search(searchText);
    });

    function getNames() {
        let names = $(".name");
        let nms = [];
        let rows = $(".name");
        for (let i = 0; i < rows.length; i++) {
            if ($(".name")[i].parentElement.hidden == false) {
                let name = "'" + rows[i].innerHTML.toString() + "'";
                nms.push(name);
            }
        }
        console.log(nms);
        nms = nms.toString();
        return nms
    }

    function search(sT) {
        let table = $(".name");
        let c;
        for (let i = 0; i < table.length; i++) {
            table[i].parentElement.hidden = false;
        }
        if (sT.length > 0) {
            c = sT[sT.length - 1];
        } else {
            c = ' ';
        }
        console.log(table);
        for (let i = 0; i < table.length; i++) {
            let name = table[i].innerHTML.toLowerCase();
            console.log(name);
            for (let j = 0; j < sT.length; j++) {
                c = sT[j].toLowerCase();
                // console.log(c);
                if (!name.includes(c) && c != ' ') {
                    table[i].parentElement.hidden = true;
                }
            }
        }
    }
});