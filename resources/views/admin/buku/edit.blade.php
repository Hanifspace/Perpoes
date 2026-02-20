@extends('layouts.app')

@section('contents')
<div class="w-full max-w-4xl mx-auto px-6 py-5">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-3">
        <div>
            <h1 class="text-xl font-semibold text-slate-800">Edit Buku</h1>
            <p class="text-sm text-slate-500">Perbarui data buku</p>
        </div>
        <a href="{{ route('admin.buku.index') }}"
           class="px-3 py-2 rounded-md bg-slate-100 text-slate-700 hover:bg-slate-200 text-sm">
            Kembali
        </a>
    </div>

    {{-- Pesan Error --}}
    @if ($errors->any())
        <div class="mb-3 rounded-lg border border-red-200 bg-red-50 px-4 py-2 text-red-700 text-sm">
            <ul class="list-disc pl-5 space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card --}}
    <div class="bg-white rounded-lg border border-slate-200">
        <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            @method('PUT')

            {{-- Grid (SAMA PERSIS KAYAK CREATE) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">

                {{-- Judul --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" required
                           class="mt-1 block w-full h-10 px-3 rounded-md border border-slate-300
                                  focus:border-slate-800 focus:ring focus:ring-slate-800/20 text-sm">
                </div>

                {{-- Kode Buku --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Kode Buku</label>
                    <input type="text" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku) }}" required
                           class="mt-1 block w-full h-10 px-3 rounded-md border border-slate-300
                                  focus:border-slate-800 focus:ring focus:ring-slate-800/20 text-sm">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Kategori</label>
                    <select name="kategori_id" required
                            class="mt-1 block w-full h-10 px-3 rounded-md border border-slate-300 bg-white
                                   focus:border-slate-800 focus:ring focus:ring-slate-800/20 text-sm">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ old('kategori_id', $buku->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tahun Terbit --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required
                           class="mt-1 block w-full h-10 px-3 rounded-md border border-slate-300
                                  focus:border-slate-800 focus:ring focus:ring-slate-800/20 text-sm">
                </div>

                {{-- Penulis --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Penulis</label>
                    <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required
                           class="mt-1 block w-full h-10 px-3 rounded-md border border-slate-300
                                  focus:border-slate-800 focus:ring focus:ring-slate-800/20 text-sm">
                </div>

                {{-- Penerbit --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Penerbit</label>
                    <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required
                           class="mt-1 block w-full h-10 px-3 rounded-md border border-slate-300
                                  focus:border-slate-800 focus:ring focus:ring-slate-800/20 text-sm">
                </div>

                {{-- Stok --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Stok</label>
                    <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}" min="0" required
                           class="mt-1 block w-full h-10 px-3 rounded-md border border-slate-300
                                  focus:border-slate-800 focus:ring focus:ring-slate-800/20 text-sm">
                </div>

                {{-- Spacer biar layout tetap rapih di md --}}
                <div class="hidden md:block"></div>

                {{-- Cover Drag & Drop (posisi sebelum Sinopsis) --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-medium text-slate-600">Cover (opsional) — Drag & Drop</label>

                    <input id="coverInput" type="file" name="cover" accept="image/*" class="hidden">

                    @php
                        $oldCover = $buku->cover ? asset('storage/' . $buku->cover) : null;
                        $oldCoverName = $buku->cover ? basename($buku->cover) : '';
                    @endphp

                    <div id="dropzone"
                         class="mt-2 flex items-center gap-4 rounded-lg border border-dashed border-slate-300 bg-slate-50 p-4
                                hover:bg-slate-100 transition cursor-pointer">

                        <div class="shrink-0">
                            <div id="placeholder" class="{{ $oldCover ? 'hidden' : '' }} w-20 h-28 rounded-md border border-slate-200 bg-white flex items-center justify-center">
                                <span class="text-xs text-slate-400">No cover</span>
                            </div>

                            <img id="previewImg"
                                 src="{{ $oldCover ?? '' }}"
                                 alt="preview"
                                 class="{{ $oldCover ? '' : 'hidden' }} w-20 h-28 object-cover rounded-md border border-slate-200 bg-white" />
                        </div>

                        <div class="flex-1">
                            <p class="text-sm font-medium text-slate-700">
                                Tarik & lepas gambar di sini, atau <span class="underline">klik untuk pilih file</span>
                            </p>
                            <p class="text-xs text-slate-500 mt-1">
                                Format: JPG/PNG/WebP • Maks 2MB
                            </p>

                            <div class="mt-2 flex items-center gap-2">
                                <button type="button" id="btnChoose"
                                        class="px-3 py-2 rounded-md bg-slate-900 text-white hover:bg-slate-800 text-xs">
                                    Pilih File
                                </button>

                                <button type="button" id="btnRemove"
                                        class="px-3 py-2 rounded-md bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs {{ $oldCover ? '' : 'hidden' }}">
                                    Hapus
                                </button>

                                <span id="fileName" class="text-xs text-slate-600 truncate">
                                    {{ $oldCoverName }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <p class="mt-2 text-xs text-slate-500">
                        Upload cover baru untuk mengganti cover lama.
                    </p>
                </div>

                {{-- Deskripsi --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-medium text-slate-600">Deskripsi</label>
                    <textarea name="sinopsis" rows="4"
                              class="mt-1 block w-full px-3 py-2 rounded-md
                                     border border-slate-300 bg-white
                                     text-sm text-slate-900
                                     focus:border-slate-800 focus:ring focus:ring-slate-800/20"
                              placeholder="Tulis deskripsi singkat buku...">{{ old('sinopsis', $buku->sinopsis) }}</textarea>
                </div>

            </div>

            {{-- Action --}}
            <div class="flex justify-end gap-2 mt-4 pt-3 border-t border-slate-200">
                <a href="{{ route('admin.buku.index') }}"
                   class="px-4 py-2 rounded-md bg-slate-100 text-slate-700 text-sm hover:bg-slate-200">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 rounded-md bg-slate-900 text-white text-sm hover:bg-slate-800">
                    Update
                </button>
            </div>

        </form>
    </div>

</div>

{{-- Drag & Drop Script --}}
<script>
(function () {
    const dropzone = document.getElementById('dropzone');
    const input = document.getElementById('coverInput');
    const btnChoose = document.getElementById('btnChoose');
    const btnRemove = document.getElementById('btnRemove');
    const fileName = document.getElementById('fileName');
    const previewImg = document.getElementById('previewImg');
    const placeholder = document.getElementById('placeholder');

    // Simpan kondisi awal (cover lama)
    const originalSrc = (previewImg && !previewImg.classList.contains('hidden')) ? previewImg.src : '';
    const originalName = fileName ? fileName.textContent : '';

    const setPreview = (file) => {
        if (!file) return;
        if (!file.type || !file.type.startsWith('image/')) {
            alert('File harus berupa gambar.');
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            previewImg.src = e.target.result;
            previewImg.classList.remove('hidden');
            placeholder.classList.add('hidden');

            fileName.textContent = file.name;
            btnRemove.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    };

    const resetToOriginal = () => {
        input.value = '';

        if (originalSrc) {
            previewImg.src = originalSrc;
            previewImg.classList.remove('hidden');
            placeholder.classList.add('hidden');
            fileName.textContent = originalName;
            btnRemove.classList.remove('hidden');
        } else {
            previewImg.src = '';
            previewImg.classList.add('hidden');
            placeholder.classList.remove('hidden');
            fileName.textContent = '';
            btnRemove.classList.add('hidden');
        }
    };

    dropzone.addEventListener('click', () => input.click());

    btnChoose.addEventListener('click', (e) => {
        e.stopPropagation();
        input.click();
    });

    btnRemove.addEventListener('click', (e) => {
        e.stopPropagation();
        resetToOriginal();
    });

    input.addEventListener('change', () => {
        const file = input.files && input.files[0];
        if (file) setPreview(file);
    });

    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('ring-2', 'ring-slate-900/20');
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('ring-2', 'ring-slate-900/20');
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('ring-2', 'ring-slate-900/20');

        const file = e.dataTransfer.files && e.dataTransfer.files[0];
        if (!file) return;

        const dt = new DataTransfer();
        dt.items.add(file);
        input.files = dt.files;

        setPreview(file);
    });
})();
</script>
@endsection
