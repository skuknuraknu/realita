        <script>
            $(document).ready(function($){
                //add
                $(document).on('click', ".new_btn",function(e){

                    let row = $(this).closest('tr').clone();
                    $.each(row.find('td'), function(i1, v1){
                        $(this).html('')
                        if($(this).is(':nth-child(4)')){
                            $(this).html(`<select name="role" type="text" id="role" class="role d-inline form-control w-auto required">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                </select>`)
                        }
                        if ($(this).is(':last-child')) {
                            $(this).html("<span class='badge btn btn-danger del_btn'>Delete</span>  <span class='badge btn btn-success save_btn'>Save</span> <span class='badge btn btn-info new_btn'>Add row</span")
                        }
                    })

                    $(this).closest('tr').after(row);
                    // console.log(row[0].innerText);
                    // console.log($(this).closest('tr').after(row)[0].innerText.split("\t").slice(0, -1));
                    // console.log(row);
                })

                //save
                 $(document).on('click', ".save_btn",function(e){
                   let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
                   let id = setiapBaris[0]
                   let username = setiapBaris[1]
                   let unit_kerja = setiapBaris[2]
                   let role = $(this).closest('tr').find('select').val()

                      $.ajax({
                           type:'POST',
                           url:"{{ route('unitkerja.add') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                            id,
                            username,
                            unit_kerja,
                            role,
                            },
                           success:function(data){
                               console.log(data)
                             Swal.fire({
                                  title: 'DATA SUKSES TERSIMPAN',
                                  confirmButtonText: 'OK',
                                }).then((result) => {
                                  /* Read more about isConfirmed, isDenied below */
                                  if (result.isConfirmed) {
                                    location.reload()
                                  }
                                })
                           }
                        });
                })

                //del
                $(document).on('click', ".del_btn",function(e){
                    let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
                       Swal.fire({
                              title: 'Data ini akan dihapus, apa anda yakin ?',
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Ya, Hapus data ini!'
                            }).then((result) => {
                              if (result.isConfirmed) {
                                 $.ajax({
                                   type:'POST',
                                   url:"{{ route('unitkerja.del') }}",
                                   data:{
                                     "_token": "{{ csrf_token() }}",
                                    id:setiapBaris[0],
                                    },
                                   success:function(data){
                                        Swal.fire(
                                          'Terhapus!',
                                          'Data sudah terhapus.',
                                          'success'
                                        )
                                        location.reload()
                                      }
                            })
                           }
                        });


                })
            })
        </script>
