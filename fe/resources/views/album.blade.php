<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Music Player</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
        crossorigin="anonymous"></script>
</head>

<body class="bg-[#F9F9F9]">

    {{-- <div class="mx-12 py-6 lg:grid lg:grid-cols-2 "> --}}
    <div class="mx-12 py-6 lg:flex lg:justify-center gap-10">
        <div class="">
            <div class="flex items-center justify-between pt-6">
                <h1 class="font-bold text-2xl">My Album Music</h1>
                {{-- <div class="relative lg:hidden">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" id="small-input"
                        class="block px-9 py-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Type here to search">
                </div> --}}
            </div>

            <div class="mt-4">
                <h1 class="font-bold text-lg">Album Anda</h1>
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-4 w-fit">

                    @foreach ($dataAlbum as $album)
                        <div>
                            <button href="listLagu/{{ $album['nama_album'] }}"
                                onclick="modalroute('{{ $album['nama_album'] }}')"
                                data-modal-toggle="editAlbumModal{{ $album['nama_album'] }}">
                                @if ($album['cover'])
                                    <img class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 rounded-xl  w-[10.4rem] h-[100px]"
                                        src="{{ asset('storage/cover/' . $album['cover']) }}" alt="">
                                @else
                                    <img class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 rounded-xl w-[10.4rem]  h-[100px]"
                                        src="https://source.unsplash.com/800x600/?music"
                                        alt="">
                                @endif
                            </button>
                            <div>
                                <p class="font-bold">{{ $album['nama_album'] }}</p>

                                <button id="dropdownDefault{{ $album['nama_album'] }}"
                                    data-dropdown-toggle="dropdown{{ $album['nama_album'] }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5 text-center inline-flex items-center"
                                    type="button">Menu <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdown{{ $album['nama_album'] }}"
                                    class="hidden z-10 w-32 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefault{{ $album['nama_album'] }}">
                                        <li>
                                            <button data-modal-toggle="delete-modal"
                                                onclick="deleteAlbums('{{ $album['nama_album'] }}')"
                                                class="w-full block py-2 px-4 hover:bg-gray-100 text-red-600">Delete
                                                Album</button>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    {{-- <div>
                            <img class="rounded-xl"
                                src="https://i.ytimg.com/vi/fKtY_37r1VI/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&rs=AOn4CLBfZaLFEtxONyLc_BWk_lDzojB9dw"
                                alt="">
                            <p class="font-bold">{{ $album['nama_album'] }}</p>
                            <div class="flex gap-2">
                                <button
                                    class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center"
                                    type="button" data-modal-toggle="delete-modal"
                                    onclick="deleteAlbums({{ $album['id'] }})">
                                    Delete
                                </button>
                                <button
                                    class="block text-white bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center"
                                    type="button" data-modal-toggle="editAlbumModal">
                                    Edit
                                </button>
                            </div>
                        </div> --}}
                    <div>
                        <!-- Modal toggle -->
                        <button
                            class="block w-32 h-36 text-white bg-slate-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-3xl px-5 py-2.5 text-center hover:animate-pulse-custom"
                            type="button" data-modal-toggle="authentication-modal">
                            +
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <h1 class="font-bold text-lg">Sedang Diputar</h1>
                <div class="">
                    <!-- <div data-popover-target="popover-top" data-popover-placement="top"
            class="border shadow rounded-xl w-80 flex flex-col items-center py-4"> -->
                    <div data-popover-target="popover-top" data-popover-placement="top"
                        class="border shadow rounded-xl w-48 flex flex-col items-center p-4">

                        <h2 id="judul" class="mb-4 font-bold text-xl text-center">All We Know</h2>
                        <audio id="audio" src="storage/audios/All We Know.mp3">

                        </audio>
                        <img id="imgMusic" class="w-40 h-40 rounded-full object-cover animate-spin-slow paused"
                            src="https://i.ytimg.com/vi/lEi_XBg2Fpk/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&rs=AOn4CLDd-GJXEGE5ax9lDBOIcqSvTm7IHg"
                            alt="">

                        <div class="mt-8 flex items-center">

                            <button class="w-11 mx-2" onclick="playMusic()">
                                <div id="play" class="">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 496.158 496.158" style="enable-background:new 0 0 496.158 496.158;"
                                        xml:space="preserve">
                                        <path style="fill:#32BEA6;"
                                            d="M496.158,248.085c0-137.021-111.07-248.082-248.076-248.082C111.07,0.002,0,111.062,0,248.085
                    c0,137.002,111.07,248.071,248.083,248.071C385.088,496.155,496.158,385.086,496.158,248.085z" />
                                        <path style="fill:#FFFFFF;"
                                            d="M370.805,235.242L195.856,127.818c-4.776-2.934-11.061-3.061-15.951-0.322
                    c-4.979,2.785-8.071,8.059-8.071,13.762v214c0,5.693,3.083,10.963,8.046,13.752c2.353,1.32,5.024,2.02,7.725,2.02
                    c2.897,0,5.734-0.797,8.205-2.303l174.947-106.576c4.657-2.836,7.556-7.986,7.565-13.44
                    C378.332,243.258,375.452,238.096,370.805,235.242z" />
                                    </svg>
                                </div>

                                <div id="pause" class="hidden">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 496.158 496.158"
                                        style="enable-background:new 0 0 496.158 496.158;" xml:space="preserve">
                                        <path style="fill:#E5AA17;"
                                            d="M496.158,248.085c0-137.021-111.07-248.082-248.076-248.082C111.07,0.002,0,111.062,0,248.085
                    c0,137.002,111.07,248.071,248.083,248.071C385.088,496.155,496.158,385.086,496.158,248.085z" />
                                        <g>
                                            <path style="fill:#FFFFFF;"
                                                d="M223.082,121.066h-60.006c-5.523,0-10,4.479-10,10v234.024c0,5.523,4.477,10,10,10h60.006
                      c5.523,0,10-4.477,10-10V131.066C233.082,125.545,228.605,121.066,223.082,121.066z" />
                                            <path style="fill:#FFFFFF;"
                                                d="M333.082,121.066h-60.006c-5.523,0-10,4.479-10,10v234.024c0,5.523,4.477,10,10,10h60.006
                      c5.523,0,10-4.477,10-10V131.066C343.082,125.545,338.605,121.066,333.082,121.066z" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Popover -->
                    <div data-popover id="popover-top" role="tooltip"
                        class="inline-block absolute invisible z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 ">
                        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200  ">
                            <h3 class="font-semibold text-gray-900 ">UI Music Player</h3>
                        </div>
                        <div class="py-2 px-3">
                            <p class="font-bold">Contoh animasi ketika play music</p>
                            <p>Klik tombol <span class="font-bold">play</span> untuk memulai lagu</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                    <!-- End Popover -->
                </div>
            </div>

        </div>

        <!-- <div class="md:col-span-5"></div> -->
        <div class="mt-4">
            <h1 class="font-semibold text-lg">Daftar Lagu</h1>
            <form class="flex items-center w-[30rem] my-3">
                {{-- @csrf --}}
                <label for="search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search" name="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 "
                        placeholder="Search" required>
                </div>
            </form>
            <div id="Content" class="searchData">
                {{-- <p>hehe</p> --}}
            </div>
            @foreach ($dataLagu as $lagu)
            <div class="allData">
                <div class="border-b-2 flex items-center justify-between p-4 w-[30rem]">
                    <div class="flex items-center justify-start gap-3">
                        <img class="w-16 h-16 rounded-full" src="{{ $lagu['thumbnail'] }}" alt="">
                        <p class="font-medium truncate">{{ $lagu['lagu'] }}</p>
                        <p class="font-light">{{ $lagu['artis'] }}</p>
                    </div>
                    <div>
                        <button onclick="saveLagu('{{ $lagu['lagu'] }}')" data-modal-toggle="add-to-album-modal"
                            class="block text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center">
                            Add
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
    </div>

    {{-- Modal edit album --}}
    @foreach ($dataAlbum as $data)
        <div id="editAlbumModal{{ $data['nama_album'] }}" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full backdrop-blur-sm">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <form id="cover" action="/changeCover/{{ $data['nama_album'] }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t ">
                            <h3 class="text-xl font-semibold text-gray-900 ">
                                {{ $data['nama_album'] }}
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-toggle="editAlbumModal{{ $data['nama_album'] }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="flex justify-center mt-3">



                            {{-- <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-1/2 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                            class="font-semibold">Klik untuk ubah cover album</span> atau drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG</p>
                        </div>
                        <input name="cover" id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div> --}}
                            <input type="file" name="cover" id="">
                            {{-- <img class="rounded-xl"
                src="https://i.ytimg.com/vi/fKtY_37r1VI/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&rs=AOn4CLBfZaLFEtxONyLc_BWk_lDzojB9dw"
                alt=""> --}}
                        </div>
                        <p class="font-bold text-center text-xl mt-2">{{ $data['nama_album'] }}</p>
                        <div class="p-6 ">
                            <p class="text-lg font-normal m-0">List Lagu</p>
                            @foreach ($dataList as $list)
                                @if ($data['nama_album'] == $list['nama_album'])
                                    @if ($list['nama_lagu'])
                                        <div class="border-b-2 p-4 flex items-center justify-between">

                                            <div class="flex items-center justify-start gap-3">
                                                <img class="w-16 h-16 rounded-full" src="{{ $list['thumbnail'] }}"
                                                    alt="">
                                                <p class="font-semibold">{{ $list['nama_lagu'] }}</p>
                                                <p>{{ $list['artis'] }}</p>
                                            </div>
                                            <div class="flex gap-2">
                                                <button type="button"
                                                    onclick="play('{{ $list['nama_lagu'] }}', '{{ $list['thumbnail'] }}'); playMusic();"
                                                    class="block text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center">
                                                    Play
                                                </button>
                                                <button
                                                    onclick="deleteLagu('{{ $list['nama_album'] }}', '{{ $list['nama_lagu'] }}')"
                                                    class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center">
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach

                            {{-- <div class="border-b-2 p-4 flex items-center justify-between">
                        <div class="flex items-center justify-start gap-3">
                            <img class="w-16 h-16 rounded-full"
                            src="https://i.ytimg.com/vi/lEi_XBg2Fpk/hqdefault.jpg?sqp=-oaymwEbCKgBEF5IVfKriqkDDggBFQAAiEIYAXABwAEG&rs=AOn4CLDd-GJXEGE5ax9lDBOIcqSvTm7IHg"
                            alt="">
                            <p class="font-semibold">All We Know</p>
                        </div>
                        <div class="flex gap-2">
                            <button
                                    class="block text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center">
                                    Play
                                </button>
                                <button
                                class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center">
                                Remove
                            </button>
                        </div>
                    </div> --}}

                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                Done</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    {{-- END Modal edit album --}}


    <!-- Modal nambah album -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Album Name</h3>
                    <form class="space-y-6" action="/newAlbum" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="namaAlbum" id="namaAlbum"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="My Album" required>
                        </div>
                        <button type="submit"
                            class="block w-full h-36 text-white bg-slate-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-3xl px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="delete-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="delete-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                        delete this product?</h3>
                    <a href="" id="deleteBtn" data-method="delete">
                        <button data-modal-toggle="delete-modal" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                    </a>
                    <button data-modal-toggle="delete-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>



    {{-- Modal Add Lagu Ke Album --}}
    <div id="add-to-album-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="add-to-album-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <!-- Modal header -->
                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                        Pilih Album untuk ditambahkan lagu
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-6">
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Berikut daftar album anda</p>
                    <ul class="my-4 space-y-3">
                        @foreach ($dataAlbum as $album)
                            <li>
                                <button onclick="addLagu('{{ $album['nama_album'] }}')"
                                    class="w-full flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600">
                                    {{ $album['nama_album'] }}
                                </button>
                            </li>
                        @endforeach
                        {{-- <li>
                            <button href="#"
                                class="w-full flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600">
                                Album 2
                            </button>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Add Lagu Ke Album --}}



    <script src="/js/index.js"></script>

    @vite('resources/js/app.js')
    <script>
        var namaLagu = "";

        function deleteAlbums(nama) {
            document.getElementById("deleteBtn").href = "/deleteAlbum/" + nama;
        }

        function modalroute(nama) {
            document.getElementById("cover").action = "/changeCover/" + nama;
        }

        function saveLagu(namaLagu) {
            this.namaLagu = namaLagu;
        }

        function addLagu(namaAlbum) {
            window.location = "/addLagu/" + namaAlbum + "&" + namaLagu;
        }

        function deleteLagu(namaAlbum, namaLagu) {
            window.location = "/deleteLagu/" + namaAlbum + "&" + namaLagu;
        }

        function play(namaLagu, thumbnail) {
            document.getElementById("audio").src = "storage/audios/" + namaLagu + ".mp3";
            document.getElementById("imgMusic").src = thumbnail;
            document.getElementById("judul").innerHTML = namaLagu;
        }


        $('#search').on('keyup', function() {
            $value = $(this).val()

            if($value) {
                $('.allData').hide()
                $('.searchData').show()
            } else {
                $('.allData').show()
                $('.searchData').hide()
            }

            $.ajax({
                type: 'get',
                url: `/search/${$value}`,
                // data: $value,
                success: function(data) {
                    // console.log(data)
                    $('#Content').html(data)
                }
            })
        })


        // let form = document.getElementById('search')
        // form.addEventListener('beforeInput', e => {
        //     const formdata = new FormData(form)
        //     let search = formdata.get('search')
        //     let url = ""+search

        //     fetch(url)
        //         .then(res => res.json())
        //         .then(data => {
        //             let i;
        //             let result = ""
        //             if(data.length == 0) {
        //                 result += 'Data Kosong'
        //             }

        //             for(i = 0; i < data.length; i++) {
        //                 let lagu = data[i]
        //                 result += 'helo'
        //             }
        //             document.getElementById('result').innerHTML = result
        //         }).catch((err) => console.log(err))
        // })
    </script>
</body>

</html>
