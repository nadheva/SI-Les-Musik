<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Kelas</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Kelas</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Daftar Kelas</h2>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Sekolah Musik Yamaha menekankan pengembangan musik holistik untuk siswa usia muda. Tidak seperti les piano privat yang berfokus terutama pada membaca dan bermain musik, kurikulum kami meliputi "mendengarkan, menyanyi, bermain, membaca, dan mencipta", akan mengembangkan keterampilan musik dasar secara efektif. Meskipun mungkin tampak berbeda pada awalnya, pendekatan ini memberikan landasan yang kuat bagi usia 6 hingga 7 tahun, yang ujung jarinya berkembang pesat, sehingga membuka jalan bagi keterampilan bermain yang solid.</p>
                </div>
                <div class="grid gap-8 lg:grid-cols-2">
                    @foreach($alatmusik as $c)
                    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                {{$c->nama}}
                            </span>
                            @if(count($c->course))
                            <span class="text-sm">Kelas Tersedia</span>
                            @else
                            <span class="text-sm">Kelas Ditutup</span>
                            @endif
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">Kelas {{$c->nama}}</a></h2>
                        <div class="text-center">
                            <img src="{{asset($c->foto)}}" class="rounded" alt="..." width="200" height="200">
                          </div>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{$c->deskripsi}}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                                <span class="font-medium dark:text-white">
                                    Jese Leos
                                </span>
                            </div>
                            @if(count($c->course))
                            <a href="{{route('course.show', encrypt($c->id))}}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Detail Kelas
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                            @else
                            <a class="inline-flex items-center font-medium dark:text-primary-500 disable-links">
                                Detail Kelas
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                            @endif
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
          </section>
    </main>
</x-app-layout>
