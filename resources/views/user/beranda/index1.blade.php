<x-app-layout>
    <main id="main" class="main">

        <section class="section">
          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                <div class="card-body">
                  {{-- <h5 class="card-title">Datatables</h5> --}}
                  {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> --}}
    <h5>Selamat datang di dashboard user, {{Auth::user()->name}}</h5>
                </div>
              </div>
            </div>
          </div>
        </section>
    </main>
</x-app-layout>
