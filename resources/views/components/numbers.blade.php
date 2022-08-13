<div class="flex px-10 py-1 bg-slate-100 justify-center space-x-2 text-blue-800">
    @foreach ($data as $d)
        <div key={{$d["label"]}} class="flex flex-col grow items-center text-xl">
            <p class="text-4xl text-bold">{{ $d["count"] }}</p>
            <p>{{ $d["label"] }}</p>
        </div>
    @endforeach
</div>
