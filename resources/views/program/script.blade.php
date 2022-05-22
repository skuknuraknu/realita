<script>
        $(document).ready(function($){
         //ONCHANGE SELECT IK
                $(document).on('change', ".kode_ik",function(e){
                    let kode_ik = $(this).closest('tr').find('select').val()
                    let indikator = $(this).closest('tr').find('td.indikator_kinerja')
                    $.ajax({
                           type:'GET',
                           url:"{{ route('rpk.get') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                            kode_ik:kode_ik,
                            },
                           success:function(data){
                            console.log(data)
                                indikator.text(data[1][0].indikator_kinerja)
                           
                           }
                        });
                 })

            //add
                $(document).on('click', ".new_btn",function(e){
                    let row = $(this).closest('tr').clone();
                    $.each(row.find('td'), function(i1, v1){
                        $(this).html('')
                        if($(this).is(':nth-child(2)')){
                            $(this).html("<select name='kode_ik' type='text' id='kode_ik' class='kode_ik d-inline form-control w-auto required'>  @foreach($IK as $dataIK) @if($dataIK->kode_ik === $dataProgram->kode_ik) <option value='{{$dataIK->kode_ik}}' selected='true'>{{$dataIK->kode_ik}}</option> @else <option value='{{$dataIK->kode_ik}}' >{{$dataIK->kode_ik}}</option> @endif @endforeach </select>")
                        }
                        if ($(this).is(':last-child')) {
                            $(this).html(' <span class="del_btn"><i role="button" class="rounded bg-danger py-3 px-2 fa-solid fa-trash fa-sm"></i></span> <span class="save_btn"><i role="button" class="rounded bg-info py-3 px-2 fa-solid fa-floppy-disk fa-sm"></i></span> <span class="new_btn"><i role="button" class="rounded bg-success py-3 px-2 fa-solid fa-plus fa-sm"></i></span>')
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
                   let kode_ik = $(this).closest('tr').find('select').val()
                   let kode_prog = setiapBaris[3]
                   let program = setiapBaris[4]

                      $.ajax({
                           type:'POST',
                           url:"{{ route('program.add') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                             id,
                            kode_ik,
                            kode_prog,
                            program
                            },
                           success:function(data){
                             Swal.fire({
                                  title: 'DATA SUKSES TERSIMPAN',
                                  confirmButtonText: 'OK',
                                }).then((result) => {
                                   // Read more about isConfirmed, isDenied below
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
                           url:"{{ route('program.del') }}",
                           data:{
                             "_token": "{{ csrf_token() }}",
                            id:setiapBaris[0],
                            },
                           success:function(data){
                               Swal.fire({
                                  title: 'DATA SUKSES TERHAPUS',
                                  confirmButtonText: 'OK',
                                }).then((result) => {
                                  /* Read more about isConfirmed, isDenied below */
                                  if (result.isConfirmed) {
                                    location.reload()
                                  }
                                })
                              }
                            })
                           }
                        });


                })
            })
        </script>
