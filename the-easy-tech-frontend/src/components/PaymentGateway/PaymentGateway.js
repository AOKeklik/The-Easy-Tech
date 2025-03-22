import SectionLeft from './SectionLeft/SectionLeft'
import SectionRight from './SectionRight/SectionRight';

const PaymentGateway = () => {
    return <div>
        <section className='payment-gateway-one style-first lg:mt-[100px] sm:mt-16 mt-10 bg-surface relative bg-slate-300'>
            <SectionLeft />   
            <SectionRight />         
        </section>
    </div>
};

export default PaymentGateway