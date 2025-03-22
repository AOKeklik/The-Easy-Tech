import SectionForm from "./SectionForm/SectionForm"
import SectionTitle from './SectionTitle/SectionTitle'


const FormRequest = () => {

    return <div className='form-request-block lg:mt-[100px] sm:mt-16 mt-10'>
        <div className='container'>
            <SectionTitle />
            <SectionForm />
        </div>
    </div>
};

export default FormRequest;