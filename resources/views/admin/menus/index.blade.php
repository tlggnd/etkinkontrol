@extends('admin.layouts.app')

@section('content')
    <div class="row mt-5 pt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-0">Menü Yönetimi</h6>
                    <a href="{{ route('admin.menus.create') }}" class="btn btn-primary mb-3">Yeni Menü Ekle</a>

                    <ul id="menu-sortable" class="list-group">
                        @foreach ($menus as $menu)
                            @include('admin.menus.partials.menu-item', ['menu' => $menu])
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#menu-sortable").sortable({
                handle: ".handle",
                connectWith: ".submenu-sortable", // Allow dragging between lists
                update: function(event, ui) {
                   // console.log("Main Sortable Update");
                    updateOrder();
                },
                start: function(event, ui) {
                     ui.item.startPos = ui.item.index();
                },


            }).disableSelection();

            $(".submenu-sortable").sortable({
                handle: ".handle",
                connectWith: ".submenu-sortable",
                update: function(event, ui) {
                  //  console.log("Submenu Sortable Update");
                  //  console.log("Sender:", ui.sender ? ui.sender.attr('id') : 'None');
                    updateOrder();

                },
                start: function(event, ui) {
                     ui.item.startPos = ui.item.index();
                },
                receive: function (event, ui) {

                }

            }).disableSelection();


             function updateOrder() {
                let menuOrder = [];

                $('#menu-sortable > .list-group-item').each(function(index, element) {
                    let menu = {
                        id: $(this).data('id'),
                        order: index,
                        children: []
                    };

                    $(this).find('> .submenu-sortable > .list-group-item').each(function(childIndex, childElement) {
                        menu.children.push({
                            id: $(this).data('id'),
                            order: childIndex
                        });
                    });

                    menuOrder.push(menu);
                });

                //console.log("Sending menuOrder:", menuOrder); // Debugging


                $.ajax({
                    url: "{{ route('admin.menus.updateOrder') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        menu_order: menuOrder
                    },
                    success: function(response) {
                       // console.log("Success:", response);
                        if (response.status === 'success') {
                            // Optionally, show a success message
                            // alert('Menu order updated successfully!');
                        } else {
                            console.error("Error updating menu order:", response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                    }
                });
            }

        });
    </script>
@endsection