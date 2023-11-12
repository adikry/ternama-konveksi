<div class="flex justify-center align-center flex-col">
    @for ($i = 0; $i < count($getRecord()->content); $i++)
        <img src="{{ asset('storage/' . $getRecord()->content[$i]['content']) }}" alt="Thumbnail Konten Image"
            width="80" height="80" class="mb-2">
    @endfor
</div>
