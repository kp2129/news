import { useEffect, useRef } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';
import { Scanner } from '@yudiel/react-qr-scanner';

export default function Dashboard({ auth }) {
    const { data, setData, post, reset, errors } = useForm({
        barcode: ''
    });

    const handleBarcodeInput = (result) => {
        console.log("Submitting barcode 1:", result);
        if (result) {
          
            setData('barcode', result[0].rawValue); // Update barcode with the scanned result
        }
    };

    useEffect(() => {
        if (data.barcode) {
            console.log("Submitting barcode:", data.barcode);
            post(route('validate-barcode'));
        }
    }, [data.barcode]); 

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center	">
                    <div className="qr-scanner w-2/4">
                        <Scanner onScan={handleBarcodeInput} />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
