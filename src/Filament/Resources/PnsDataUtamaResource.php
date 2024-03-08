<?php

namespace Kanekescom\Siasn\Simpeg\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Kanekescom\Siasn\Simpeg\Filament\Resources\PnsDataUtamaResource\Pages;
use Kanekescom\Siasn\Simpeg\Models\PnsDataUtama;

class PnsDataUtamaResource extends Resource
{
    protected static ?string $model = PnsDataUtama::class;

    protected static ?string $slug = 'pns-data-utama';

    protected static ?string $pluralLabel = 'Data Utama';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Data Utama';

    protected static ?string $navigationGroup = 'PNS';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->maxLength(42),
                Forms\Components\TextInput::make('nipBaru')
                    ->required()
                    ->maxLength(18),
                Forms\Components\TextInput::make('nipLama')
                    ->required()
                    ->maxLength(9),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gelarDepan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gelarBelakang')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempatLahir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempatLahirId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('tglLahir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('agama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('agamaId')
                    ->maxLength(2),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emailGov')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->maxLength(16),
                Forms\Components\Textarea::make('alamat')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('noHp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('noTelp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisPegawaiId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('mkTahun')
                    ->maxLength(2),
                Forms\Components\TextInput::make('mkBulan')
                    ->maxLength(2),
                Forms\Components\TextInput::make('jenisPegawaiNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kedudukanPnsId')
                    ->maxLength(2),
                Forms\Components\TextInput::make('kedudukanPnsNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statusPegawai')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenisKelamin')
                    ->maxLength(1),
                Forms\Components\TextInput::make('jenisIdDokumenId')
                    ->maxLength(2),
                Forms\Components\TextInput::make('jenisIdDokumenNama')
                    ->maxLength(255),
                Forms\Components\Textarea::make('nomorIdDocument')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('noSeriKarpeg')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('tkPendidikanTerakhirId')
                    ->maxLength(2),
                Forms\Components\TextInput::make('tkPendidikanTerakhir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pendidikanTerakhirId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('pendidikanTerakhirNama')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahunLulus')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtPns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtPensiun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bupPensiun')
                    ->maxLength(2),
                Forms\Components\TextInput::make('tglSkPns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtCpns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglSkCpns')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instansiIndukId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('instansiIndukNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('satuanKerjaIndukId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('satuanKerjaIndukNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kanregId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('kanregNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('instansiKerjaId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('instansiKerjaNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('instansiKerjaKodeCepat')
                    ->maxLength(255),
                Forms\Components\TextInput::make('satuanKerjaKerjaId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('satuanKerjaKerjaNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('unorId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('unorNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('unorIndukId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('unorIndukNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jenisJabatanId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('jenisJabatan')
                    ->maxLength(255),
                Forms\Components\Textarea::make('jabatanNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jabatanStrukturalId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('jabatanStrukturalNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jabatanFungsionalId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('jabatanFungsionalNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jabatanFungsionalUmumId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('jabatanFungsionalUmumNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('tmtJabatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasiKerjaId')
                    ->maxLength(42),
                Forms\Components\TextInput::make('lokasiKerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('golRuangAwalId')
                    ->maxLength(2),
                Forms\Components\TextInput::make('golRuangAwal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('golRuangAkhirId')
                    ->maxLength(2),
                Forms\Components\TextInput::make('golRuangAkhir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtGolAkhir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('masaKerja')
                    ->maxLength(255),
                Forms\Components\TextInput::make('eselon')
                    ->maxLength(255),
                Forms\Components\TextInput::make('eselonId')
                    ->maxLength(2),
                Forms\Components\TextInput::make('eselonLevel')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tmtEselon')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gajiPokok')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kpknId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('kpknNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('ktuaId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('ktuaNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('taspenId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('taspenNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jenisKawinId')
                    ->maxLength(2),
                Forms\Components\TextInput::make('statusPerkawinan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('statusHidup')
                    ->maxLength(1),
                Forms\Components\TextInput::make('tglSuratKeteranganDokter')
                    ->maxLength(255),
                Forms\Components\Textarea::make('noSuratKeteranganDokter')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jumlahIstriSuami')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlahAnak')
                    ->maxLength(255),
                Forms\Components\Textarea::make('noSuratKeteranganBebasNarkoba')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('tglSuratKeteranganBebasNarkoba')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skck')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglSkck')
                    ->maxLength(255),
                Forms\Components\TextInput::make('akteKelahiran')
                    ->maxLength(255),
                Forms\Components\TextInput::make('akteMeninggal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglMeninggal')
                    ->maxLength(255),
                Forms\Components\Textarea::make('noNpwp')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('tglNpwp')
                    ->maxLength(255),
                Forms\Components\Textarea::make('noAskes')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('bpjs')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kodePos')
                    ->maxLength(8),
                Forms\Components\Textarea::make('noSpmt')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('noTaspen')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('bahasa')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kppnId')
                    ->maxLength(42),
                Forms\Components\Textarea::make('kppnNama')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('pangkatAkhir')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tglSttpl')
                    ->maxLength(255),
                Forms\Components\Textarea::make('nomorSttpl')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('nomorSkCpns')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('nomorSkPns')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jenjang')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatanAsn')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kartuAsn')
                    ->maxLength(255),
                Forms\Components\TextInput::make('validNik')
                    ->maxLength(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->label('ID'),
                Tables\Columns\TextColumn::make('nipBaru')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nipLama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('gelarDepan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('gelarBelakang')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tempatLahir')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tempatLahirId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglLahir')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('agama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('agamaId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('email')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('emailGov')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nik')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('noHp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('noTelp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisPegawaiId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('mkTahun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('mkBulan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisPegawaiNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kedudukanPnsId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kedudukanPnsNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusPegawai')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisKelamin')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisIdDokumenId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisIdDokumenNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tkPendidikanTerakhirId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tkPendidikanTerakhir')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pendidikanTerakhirId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pendidikanTerakhirNama')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tahunLulus')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtPns')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtPensiun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('bupPensiun')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglSkPns')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtCpns')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglSkCpns')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiIndukId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaIndukId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kanregId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('instansiKerjaKodeCepat')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('satuanKerjaKerjaId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unorIndukId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatanId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanStrukturalId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanFungsionalUmumId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtJabatan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('lokasiKerjaId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('lokasiKerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golRuangAwalId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golRuangAwal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golRuangAkhirId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('golRuangAkhir')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtGolAkhir')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('masaKerja')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('eselon')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('eselonId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('eselonLevel')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tmtEselon')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('gajiPokok')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kpknId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('ktuaId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('taspenId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenisKawinId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusPerkawinan')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('statusHidup')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglSuratKeteranganDokter')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlahIstriSuami')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jumlahAnak')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglSuratKeteranganBebasNarkoba')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('skck')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglSkck')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('akteKelahiran')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('akteMeninggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglMeninggal')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglNpwp')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('bpjs')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kodePos')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('bahasa')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kppnId')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('pangkatAkhir')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('tglSttpl')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jenjang')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('jabatanAsn')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('kartuAsn')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('validNik')
                    ->wrap()
                    ->copyable()
                    ->sortable()
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePnsDataUtamas::route('/'),
        ];
    }
}
