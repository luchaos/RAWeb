<?php
$noteCount = 0;
?>
<x-section>
    <h3>Code Notes</h3>
    <table class="table table-striped table-hover table-sm">
        <tbody>
        <tr>
            <th>Mem</th>
            <th>Note</th>
            <th>Author</th>
        </tr>
        @foreach($memoryNotes as $memoryNote)
            <?php
            if (strlen($nextMemoryNote['Note']) <= 2) {
                continue;
            }
            ?>
            <tr>
                <?php
                $addr = $nextMemoryNote['Address'];
                $addrInt = hexdec($addr);
                $addrFormatted = sprintf("%04x", $addrInt);
                //$memNote = str_replace( "\n", "<br>", $nextMemoryNote['Note'] );
                $memNote = parseShortcodes($nextMemoryNote['Note']);
                ?>
                <td style="width: 25%;">
                    <code>0x{{ $addrFormatted }}</code>
                </td>
                <td>
                    <div style="word-break:break-all;">{{ $memNote }}</div>
                </td>
                <td>
                    <x-user.avatar :user="$memoryNote->author" display="icon" />
                    <x-user.avatar :user="$memoryNote->author" />
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-section>
