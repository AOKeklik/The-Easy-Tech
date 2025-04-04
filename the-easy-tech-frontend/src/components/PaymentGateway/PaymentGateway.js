import SectionLeft from './SectionLeft/SectionLeft'
import SectionRight from './SectionRight/SectionRight';

const PaymentGateway = ({data}) => {
    return data.data && <div>
        <section className='payment-gateway-one style-first lg:mt-[100px] sm:mt-16 mt-10 bg-surface relative bg-slate-300'>
            <SectionLeft data={data} />   
            <SectionRight data={data} />         
        </section>
    </div>
};

export default PaymentGateway