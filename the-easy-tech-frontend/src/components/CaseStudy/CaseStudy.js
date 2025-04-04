import Link from 'next/link'
import * as Icon from '@phosphor-icons/react/dist/ssr'
import CaseStudyItem from './CaseStudyItem.js/CaseStudyItem';

const CaseStudy = ({data}) => {
    return <section className='case-study-block style-one lg:pt-[100px] sm:pt-16 pt-10'>
        <div className='container'>
            <div className='heading text-center'>
                <h3 className='heading3'>Case Studies</h3>
                <div className='right flex flex-col items-center gap-2 mt-3'>
                    <div className='body3'>Experience the excitement and potential of the</div>
                    <Link className='flex items-center gap-2 hover:text-blue duration-300' href='/'>
                        <div className='text-button'>View All Case List </div>
                        <Icon.CaretDoubleRight weight='bold' className='text-xs mt-1' />
                    </Link> 
                </div> 
            </div> 
        </div>
        <div className='list-case-study md:mt-10 mt-6'>
            <div className='list grid lg:grid-cols-4 sm:grid-cols-2'>
                {
                    data.data.slice(0,4).map((casestudy, i) => <CaseStudyItem key={i} {...{casestudy,i:i+1}}  />)
                }
            </div>
        </div>
    </section>
};

export default CaseStudy