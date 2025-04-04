import CounterItem from "./CounterItem/CounterItem"

const Counter = ({data}) => {
      const counters = [
        { title: "Business Setup Growth", number: data.data.growth },
        { title: "Business Passive Income", number: data.data.solving },
        { title: "Business Problem Solving", number: data.data.income },
        { title: "Business Goal Achivever", number: data.data.achiever },
      ]

    return <div className='container bg-slate-100 rounded-md pt-8'>
        <div className="counter-block lg:pb-[50px] sm:pb-16 pb-10">
            <div className='grid xl:grid-cols-4 grid-cols-2 gap-y-8'>
                {
                    counters.length > 0 && counters.map(({title,number},i) => <CounterItem key={i} {...{title,number}} />)
                }
            </div>
        </div>
    </div>
}

export default Counter;